<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER status_logger BEFORE UPDATE ON `barang` FOR EACH ROW
        BEGIN
        IF OLD.status != NEW.status THEN
        INSERT INTO logbarang
        set idbarang = OLD.id,
        statuslama=old.status,
        statusbaru=new.status,
        logtanggal = NOW(); 
        END IF;
        END');

        DB::unprepared('
        CREATE TRIGGER update_jumlah_barang_2 BEFORE INSERT ON `barangmasuk` FOR EACH ROW
        BEGIN
    
        UPDATE barang
        SET jumlahbarang = jumlahbarang + NEW.jumlahmasuk
        WHERE id = (SELECT idbarang FROM barangkeluar WHERE id = NEW.idkeluar);
        END');

        DB::unprepared('
        CREATE TRIGGER update_jumlah_barang BEFORE INSERT ON `barangkeluar` FOR EACH ROW
        BEGIN
        DECLARE available_quantity INT;

    
        SELECT jumlahbarang INTO available_quantity
        FROM barang
        WHERE id = NEW.idbarang;

    
        IF available_quantity >= NEW.jumlahkeluar THEN
        
        UPDATE barang
        SET jumlahbarang = jumlahbarang - NEW.jumlahkeluar
        WHERE id = NEW.idbarang;
        ELSE
        
        SIGNAL SQLSTATE "45000"
        SET MESSAGE_TEXT = "Insufficient quantity in barang table";
        END IF;
        END');

        DB::unprepared('
        CREATE TRIGGER update_kondisi_rusak BEFORE UPDATE ON `barang` FOR EACH ROW
        BEGIN
        IF NEW.status = "rusak" THEN
        SET NEW.kondisi = "rusak";
        END IF;
        END');

        DB::unprepared('
        CREATE TRIGGER update_status_keluar AFTER INSERT ON `barangkeluar` FOR EACH ROW
        BEGIN

        update barang
        set status = New.statuskeluar
        where id = New.idbarang;

        END');

        DB::unprepared('
        CREATE TRIGGER update_status_masuk AFTER UPDATE ON `barangkeluar` FOR EACH ROW
        BEGIN

        update barang
        set status = New.statuskeluar
        where id = New.idbarang;

        END');

        DB::unprepared('
        CREATE TRIGGER update_status_ready AFTER INSERT ON `barangmasuk` FOR EACH ROW
        BEGIN
        update barangkeluar
        set statuskeluar = New.statusmasuk
        where id = New.idkeluar;
        END');

        DB::unprepared('
        CREATE TRIGGER prevent_exceed_amount BEFORE INSERT ON `barangmasuk` FOR EACH ROW
        BEGIN
        DECLARE total_masuk INT;
        DECLARE available_quantity INT;

    -- Calculate the total quantity already inserted for this idkeluar
        SELECT SUM(jumlahmasuk) INTO total_masuk
        FROM barangmasuk
        WHERE idkeluar = NEW.idkeluar;

        IF total_masuk IS NULL THEN
           SET total_masuk = 0;
        END IF;

    -- Calculate the available quantity
        SELECT jumlahkeluar - total_masuk INTO available_quantity
        FROM barangkeluar
        WHERE id = NEW.idkeluar;

    -- Check if the requested quantity exceeds the available quantity
        IF NEW.jumlahmasuk > available_quantity THEN
        SIGNAL SQLSTATE "45000"
        SET MESSAGE_TEXT = "Not enough items available for this transaction.";
        END IF;
        END;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `status_logger`');
        DB::unprepared('DROP TRIGGER `update_jumlah_barang_2`');
        DB::unprepared('DROP TRIGGER `update_jumlah_barang`');
        DB::unprepared('DROP TRIGGER `update_kondisi_rusak`');
        DB::unprepared('DROP TRIGGER `update_status_keluar`');
        DB::unprepared('DROP TRIGGER `update_status_masuk`');
        DB::unprepared('DROP TRIGGER `update_status_ready`');
        DB::unprepared('DROP TRIGGER `prevent_exceed_amount`');
    }
};
