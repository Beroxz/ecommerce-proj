<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        DB::table('districts')->insert([
            // กรุงเทพมหานคร
            ['code' => '101', 'name_th' => 'พระนคร', 'name_en' => 'Phra Nakhon', 'province_id' => 1],
            ['code' => '102', 'name_th' => 'ดุสิต', 'name_en' => 'Dusit', 'province_id' => 1],
            ['code' => '103', 'name_th' => 'บางซื่อ', 'name_en' => 'Bang Sue', 'province_id' => 1],
            ['code' => '104', 'name_th' => 'บางกอกน้อย', 'name_en' => 'Bangkok Noi', 'province_id' => 1],
            ['code' => '105', 'name_th' => 'บางกอกใหญ่', 'name_en' => 'Bangkok Yai', 'province_id' => 1],
            ['code' => '106', 'name_th' => 'หนองจอก', 'name_en' => 'Nong Chok', 'province_id' => 1],
            ['code' => '107', 'name_th' => 'ลาดกระบัง', 'name_en' => 'Lat Krabang', 'province_id' => 1],
            ['code' => '108', 'name_th' => 'พระโขนง', 'name_en' => 'Phra Khanong', 'province_id' => 1],
            ['code' => '109', 'name_th' => 'ทวีวัฒนา', 'name_en' => 'Thawi Watthana', 'province_id' => 1],
            ['code' => '110', 'name_th' => 'คลองสามวา', 'name_en' => 'Khlong Samwa', 'province_id' => 1],
            ['code' => '111', 'name_th' => 'หนองแขม', 'name_en' => 'Nong Khaem', 'province_id' => 1],
            ['code' => '112', 'name_th' => 'บางนา', 'name_en' => 'Bang Na', 'province_id' => 1],
            ['code' => '113', 'name_th' => 'จอมทอง', 'name_en' => 'Chom Thong', 'province_id' => 1],
            ['code' => '114', 'name_th' => 'สาทร', 'name_en' => 'Sathorn', 'province_id' => 1],
            ['code' => '115', 'name_th' => 'บางรัก', 'name_en' => 'Bang Rak', 'province_id' => 1],
            ['code' => '116', 'name_th' => 'วัฒนา', 'name_en' => 'Watthana', 'province_id' => 1],
            ['code' => '117', 'name_th' => 'คลองเตย', 'name_en' => 'Khlong Toei', 'province_id' => 1],
            ['code' => '118', 'name_th' => 'พญาไท', 'name_en' => 'Phaya Thai', 'province_id' => 1],
            ['code' => '119', 'name_th' => 'ราชเทวี', 'name_en' => 'Ratchathewi', 'province_id' => 1],
            ['code' => '120', 'name_th' => 'ดินแดง', 'name_en' => 'Din Daeng', 'province_id' => 1],
            ['code' => '121', 'name_th' => 'ห้วยขวาง', 'name_en' => 'Huai Khwang', 'province_id' => 1],
            ['code' => '122', 'name_th' => 'บางกอกใหญ่', 'name_en' => 'Bangkok Yai', 'province_id' => 1],
            ['code' => '123', 'name_th' => 'ตลิ่งชัน', 'name_en' => 'Taling Chan', 'province_id' => 1],
            ['code' => '124', 'name_th' => 'บางพลัด', 'name_en' => 'Bang Phlat', 'province_id' => 1],
            ['code' => '125', 'name_th' => 'คลองสาน', 'name_en' => 'Khlong San', 'province_id' => 1],
            ['code' => '126', 'name_th' => 'ธนบุรี', 'name_en' => 'Thon Buri', 'province_id' => 1],
            ['code' => '127', 'name_th' => 'บางแค', 'name_en' => 'Bang Khae', 'province_id' => 1],
            ['code' => '128', 'name_th' => 'ภาษีเจริญ', 'name_en' => 'Phasi Charoen', 'province_id' => 1],
            ['code' => '129', 'name_th' => 'จอมทอง', 'name_en' => 'Chom Thong', 'province_id' => 1],
            ['code' => '130', 'name_th' => 'คลองเตย', 'name_en' => 'Khlong Toei', 'province_id' => 1],
            ['code' => '131', 'name_th' => 'ประเวศ', 'name_en' => 'Prawet', 'province_id' => 1],
            ['code' => '132', 'name_th' => 'สาทร', 'name_en' => 'Sathorn', 'province_id' => 1],
            ['code' => '133', 'name_th' => 'บางนา', 'name_en' => 'Bang Na', 'province_id' => 1],
            ['code' => '134', 'name_th' => 'คลองสามวา', 'name_en' => 'Khlong Samwa', 'province_id' => 1],
            ['code' => '135', 'name_th' => 'ลาดกระบัง', 'name_en' => 'Lat Krabang', 'province_id' => 1],
            ['code' => '136', 'name_th' => 'หนองจอก', 'name_en' => 'Nong Chok', 'province_id' => 1],
            ['code' => '137', 'name_th' => 'วัฒนา', 'name_en' => 'Watthana', 'province_id' => 1],
            ['code' => '138', 'name_th' => 'ลาดพร้าว', 'name_en' => 'Lat Phrao', 'province_id' => 1],
            ['code' => '139', 'name_th' => 'ดินแดง', 'name_en' => 'Din Daeng', 'province_id' => 1],
            ['code' => '140', 'name_th' => 'ห้วยขวาง', 'name_en' => 'Huai Khwang', 'province_id' => 1],
            ['code' => '141', 'name_th' => 'ตลิ่งชัน', 'name_en' => 'Taling Chan', 'province_id' => 1],

            // จังหวัดเชียงใหม่
            ['code' => '201', 'name_th' => 'เมืองเชียงใหม่', 'name_en' => 'Mueang Chiang Mai', 'province_id' => 2],
            ['code' => '202', 'name_th' => 'ฝาง', 'name_en' => 'Fang', 'province_id' => 2],
            ['code' => '203', 'name_th' => 'แม่ริม', 'name_en' => 'Mae Rim', 'province_id' => 2],
            ['code' => '204', 'name_th' => 'แม่แตง', 'name_en' => 'Mae Tang', 'province_id' => 2],
            ['code' => '205', 'name_th' => 'ดอยสะเก็ด', 'name_en' => 'Doi Saket', 'province_id' => 2],
            ['code' => '206', 'name_th' => 'สารภี', 'name_en' => 'Saraphi', 'province_id' => 2],
            ['code' => '207', 'name_th' => 'หางดง', 'name_en' => 'Hang Dong', 'province_id' => 2],
            ['code' => '208', 'name_th' => 'เชียงดาว', 'name_en' => 'Chiang Dao', 'province_id' => 2],
            ['code' => '209', 'name_th' => 'แม่วาง', 'name_en' => 'Mae Wang', 'province_id' => 2],
            ['code' => '210', 'name_th' => 'พร้าว', 'name_en' => 'Phrao', 'province_id' => 2],
            ['code' => '211', 'name_th' => 'ลอง', 'name_en' => 'Long', 'province_id' => 2],
            ['code' => '212', 'name_th' => 'แจ้ห่ม', 'name_en' => 'Jae Hom', 'province_id' => 2],
            ['code' => '213', 'name_th' => 'ดอยเต่า', 'name_en' => 'Doi Tao', 'province_id' => 2],
            ['code' => '214', 'name_th' => 'เมืองปาน', 'name_en' => 'Mueang Pan', 'province_id' => 2],

            // จังหวัดเชียงราย
            ['code' => '301', 'name_th' => 'เมืองเชียงราย', 'name_en' => 'Mueang Chiang Rai', 'province_id' => 3],
            ['code' => '302', 'name_th' => 'แม่สาย', 'name_en' => 'Mae Sai', 'province_id' => 3],
            ['code' => '303', 'name_th' => 'เชียงของ', 'name_en' => 'Chiang Khong', 'province_id' => 3],
            ['code' => '304', 'name_th' => 'พาน', 'name_en' => 'Phan', 'province_id' => 3],
            ['code' => '305', 'name_th' => 'แม่จัน', 'name_en' => 'Mae Chan', 'province_id' => 3],
            ['code' => '306', 'name_th' => 'เวียงแก่น', 'name_en' => 'Wiang Kaen', 'province_id' => 3],
            ['code' => '307', 'name_th' => 'เชียงแสน', 'name_en' => 'Chiang Saen', 'province_id' => 3],
            ['code' => '308', 'name_th' => 'ดอยหล่อ', 'name_en' => 'Doi Luang', 'province_id' => 3],
            ['code' => '309', 'name_th' => 'แม่ฟ้าหลวง', 'name_en' => 'Mae Fah Luang', 'province_id' => 3],

            // จังหวัดนครราชสีมา
            ['code' => '401', 'name_th' => 'เมืองนครราชสีมา', 'name_en' => 'Mueang Nakhon Ratchasima', 'province_id' => 4],
            ['code' => '402', 'name_th' => 'ครบุรี', 'name_en' => 'Khro Buri', 'province_id' => 4],
            ['code' => '403', 'name_th' => 'คง', 'name_en' => 'Khong', 'province_id' => 4],
            ['code' => '404', 'name_th' => 'บัวใหญ่', 'name_en' => 'Bua Yai', 'province_id' => 4],
            ['code' => '405', 'name_th' => 'ปักธงชัย', 'name_en' => 'Pak Thong Chai', 'province_id' => 4],
            ['code' => '406', 'name_th' => 'เทพารักษ์', 'name_en' => 'Thepharak', 'province_id' => 4],
            ['code' => '407', 'name_th' => 'สูงเนิน', 'name_en' => 'Sung Noen', 'province_id' => 4],
            ['code' => '408', 'name_th' => 'ขามทะเลสอ', 'name_en' => 'Kham Thale So', 'province_id' => 4],
            ['code' => '409', 'name_th' => 'หนองบุญมาก', 'name_en' => 'Nong Bua Mak', 'province_id' => 4],
            ['code' => '410', 'name_th' => 'โชคชัย', 'name_en' => 'Chok Chai', 'province_id' => 4],
            ['code' => '411', 'name_th' => 'ปากช่อง', 'name_en' => 'Pak Chong', 'province_id' => 4],
            ['code' => '412', 'name_th' => 'สตึก', 'name_en' => 'Satuek', 'province_id' => 4],
            ['code' => '413', 'name_th' => 'ประทาย', 'name_en' => 'Prathai', 'province_id' => 4],
            ['code' => '414', 'name_th' => 'ด่านขุนทด', 'name_en' => 'Dan Khun Thot', 'province_id' => 4],
            ['code' => '415', 'name_th' => 'บัวลาย', 'name_en' => 'Bua Lai', 'province_id' => 4],
            ['code' => '416', 'name_th' => 'ชุมพวง', 'name_en' => 'Chum Phuang', 'province_id' => 4],

            // จังหวัดอุบลราชธานี
            ['code' => '501', 'name_th' => 'เมืองอุบลราชธานี', 'name_en' => 'Mueang Ubon Ratchathani', 'province_id' => 5],
            ['code' => '502', 'name_th' => 'ศรีเมืองใหม่', 'name_en' => 'Si Mueang Mai', 'province_id' => 5],
            ['code' => '503', 'name_th' => 'วารินชำราบ', 'name_en' => 'Warinchamrap', 'province_id' => 5],
            ['code' => '504', 'name_th' => 'เขมราฐ', 'name_en' => 'Khemarat', 'province_id' => 5],
            ['code' => '505', 'name_th' => 'ตระการพืชผล', 'name_en' => 'Trakan Phuet Phol', 'province_id' => 5],
            ['code' => '506', 'name_th' => 'สุวรรณภูมิ', 'name_en' => 'Suwannaphum', 'province_id' => 5],
            ['code' => '507', 'name_th' => 'เดชอุดม', 'name_en' => 'Det Udom', 'province_id' => 5],
            ['code' => '508', 'name_th' => 'นาจะหลวย', 'name_en' => 'Na Jalong', 'province_id' => 5],
            ['code' => '509', 'name_th' => 'โขงเจียม', 'name_en' => 'Khong Chiam', 'province_id' => 5],
            ['code' => '510', 'name_th' => 'พิบูลมังสาหาร', 'name_en' => 'Phibun Mangsahan', 'province_id' => 5],
            ['code' => '511', 'name_th' => 'ทุ่งศรีอุดม', 'name_en' => 'Thung Si Udom', 'province_id' => 5],

            // จังหวัดสงขลา
            ['code' => '601', 'name_th' => 'เมืองสงขลา', 'name_en' => 'Mueang Songkhla', 'province_id' => 6],
            ['code' => '602', 'name_th' => 'หาดใหญ่', 'name_en' => 'Hat Yai', 'province_id' => 6],
            ['code' => '603', 'name_th' => 'คลองหอยโข่ง', 'name_en' => 'Khlong Hoi Khong', 'province_id' => 6],
            ['code' => '604', 'name_th' => 'นาทวี', 'name_en' => 'Na Thawi', 'province_id' => 6],
            ['code' => '605', 'name_th' => 'สะบ้าย้อย', 'name_en' => 'Saba Yoi', 'province_id' => 6],
            ['code' => '606', 'name_th' => 'ระโนด', 'name_en' => 'Ranod', 'province_id' => 6],
            ['code' => '607', 'name_th' => 'สิงหนคร', 'name_en' => 'Singhanakhon', 'province_id' => 6],
            ['code' => '608', 'name_th' => 'จะนะ', 'name_en' => 'Chana', 'province_id' => 6],
            ['code' => '609', 'name_th' => 'เทพา', 'name_en' => 'Thepa', 'province_id' => 6],
            ['code' => '610', 'name_th' => 'บางกล่ำ', 'name_en' => 'Bang Klam', 'province_id' => 6],
            ['code' => '611', 'name_th' => 'หาดใหญ่', 'name_en' => 'Hat Yai', 'province_id' => 6],


            // ['code' => '701', 'name_th' => 'เมือง... จังหวัด...', 'name_en' => 'Mueang ...', 'province_id' => 7],
            // ['code' => '702', 'name_th' => 'อำเภอ...', 'name_en' => 'District ...', 'province_id' => 7],
            // ...
        ]);
    }
}
