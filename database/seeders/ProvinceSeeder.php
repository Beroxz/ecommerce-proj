<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        DB::table('provinces')->insert([
            ['code' => '01', 'abbrv' => 'BKK', 'name_th' => 'กรุงเทพมหานคร', 'name_en' => 'Bangkok'],
            ['code' => '02', 'abbrv' => 'AMC', 'name_th' => 'อำนาจเจริญ', 'name_en' => 'Amnat Charoen'],
            ['code' => '03', 'abbrv' => 'ANG', 'name_th' => 'อ่างทอง', 'name_en' => 'Ang Thong'],
            ['code' => '04', 'abbrv' => 'BKN', 'name_th' => 'บึงกาฬ', 'name_en' => 'Bueng Kan'],
            ['code' => '05', 'abbrv' => 'BRM', 'name_th' => 'บุรีรัมย์', 'name_en' => 'Buri Ram'],
            ['code' => '06', 'abbrv' => 'CCO', 'name_th' => 'ฉะเชิงเทรา', 'name_en' => 'Chachoengsao'],
            ['code' => '07', 'abbrv' => 'CNT', 'name_th' => 'ชัยนาท', 'name_en' => 'Chai Nat'],
            ['code' => '08', 'abbrv' => 'CYP', 'name_th' => 'ชัยภูมิ', 'name_en' => 'Chaiyaphum'],
            ['code' => '09', 'abbrv' => 'CHA', 'name_th' => 'จันทบุรี', 'name_en' => 'Chanthaburi'],
            ['code' => '10', 'abbrv' => 'CMI', 'name_th' => 'เชียงใหม่', 'name_en' => 'Chiang Mai'],
            ['code' => '11', 'abbrv' => 'CRI', 'name_th' => 'เชียงราย', 'name_en' => 'Chiang Rai'],
            ['code' => '12', 'abbrv' => 'CBR', 'name_th' => 'ชลบุรี', 'name_en' => 'Chonburi'],
            ['code' => '13', 'abbrv' => 'CHU', 'name_th' => 'ชุมพร', 'name_en' => 'Chumphon'],
            ['code' => '14', 'abbrv' => 'KAS', 'name_th' => 'กาฬสินธุ์', 'name_en' => 'Kalasin'],
            ['code' => '15', 'abbrv' => 'KPH', 'name_th' => 'กำแพงเพชร', 'name_en' => 'Kamphaeng Phet'],
            ['code' => '16', 'abbrv' => 'KCB', 'name_th' => 'กาญจนบุรี', 'name_en' => 'Kanchanaburi'],
            ['code' => '17', 'abbrv' => 'KKH', 'name_th' => 'ขอนแก่น', 'name_en' => 'Khon Kaen'],
            ['code' => '18', 'abbrv' => 'KBI', 'name_th' => 'กระบี่', 'name_en' => 'Krabi'],
            ['code' => '19', 'abbrv' => 'LAP', 'name_th' => 'ลำปาง', 'name_en' => 'Lampang'],
            ['code' => '20', 'abbrv' => 'LHU', 'name_th' => 'ลำพูน', 'name_en' => 'Lamphun'],
            ['code' => '21', 'abbrv' => 'LOE', 'name_th' => 'เลย', 'name_en' => 'Loei'],
            ['code' => '22', 'abbrv' => 'LOB', 'name_th' => 'ลพบุรี', 'name_en' => 'Lopburi'],
            ['code' => '23', 'abbrv' => 'MHS', 'name_th' => 'แม่ฮ่องสอน', 'name_en' => 'Mae Hong Son'],
            ['code' => '24', 'abbrv' => 'MSR', 'name_th' => 'มหาสารคาม', 'name_en' => 'Maha Sarakham'],
            ['code' => '25', 'abbrv' => 'MUK', 'name_th' => 'มุกดาหาร', 'name_en' => 'Mukdahan'],
            ['code' => '26', 'abbrv' => 'NAN', 'name_th' => 'นครนายก', 'name_en' => 'Nakhon Nayok'],
            ['code' => '27', 'abbrv' => 'NPT', 'name_th' => 'นครปฐม', 'name_en' => 'Nakhon Pathom'],
            ['code' => '28', 'abbrv' => 'NPH', 'name_th' => 'นครพนม', 'name_en' => 'Nakhon Phanom'],
            ['code' => '29', 'abbrv' => 'NRT', 'name_th' => 'นครราชสีมา', 'name_en' => 'Nakhon Ratchasima'],
            ['code' => '30', 'abbrv' => 'NSW', 'name_th' => 'นครสวรรค์', 'name_en' => 'Nakhon Sawan'],
            ['code' => '31', 'abbrv' => 'NST', 'name_th' => 'นครศรีธรรมราช', 'name_en' => 'Nakhon Si Thammarat'],
            ['code' => '32', 'abbrv' => 'NAN', 'name_th' => 'น่าน', 'name_en' => 'Nan'],
            ['code' => '33', 'abbrv' => 'NAR', 'name_th' => 'นราธิวาส', 'name_en' => 'Narathiwat'],
            ['code' => '34', 'abbrv' => 'NBL', 'name_th' => 'หนองบัวลำภู', 'name_en' => 'Nong Bua Lam Phu'],
            ['code' => '35', 'abbrv' => 'NKH', 'name_th' => 'หนองคาย', 'name_en' => 'Nong Khai'],
            ['code' => '36', 'abbrv' => 'NTB', 'name_th' => 'นนทบุรี', 'name_en' => 'Nonthaburi'],
            ['code' => '37', 'abbrv' => 'PTH', 'name_th' => 'ปทุมธานี', 'name_en' => 'Pathum Thani'],
            ['code' => '38', 'abbrv' => 'PAT', 'name_th' => 'ปัตตานี', 'name_en' => 'Pattani'],
            ['code' => '39', 'abbrv' => 'PNG', 'name_th' => 'พังงา', 'name_en' => 'Phang Nga'],
            ['code' => '40', 'abbrv' => 'PTL', 'name_th' => 'พัทลุง', 'name_en' => 'Phatthalung'],
            ['code' => '41', 'abbrv' => 'PHY', 'name_th' => 'พะเยา', 'name_en' => 'Phayao'],
            ['code' => '42', 'abbrv' => 'PBU', 'name_th' => 'เพชรบูรณ์', 'name_en' => 'Phetchabun'],
            ['code' => '43', 'abbrv' => 'PBI', 'name_th' => 'เพชรบุรี', 'name_en' => 'Phetchaburi'],
            ['code' => '44', 'abbrv' => 'PIT', 'name_th' => 'พิชิต', 'name_en' => 'Phichit'],
            ['code' => '45', 'abbrv' => 'PIT', 'name_th' => 'พิษณุโลก', 'name_en' => 'Phitsanulok'],
            ['code' => '46', 'abbrv' => 'PHR', 'name_th' => 'แพร่', 'name_en' => 'Phrae'],
            ['code' => '47', 'abbrv' => 'PHU', 'name_th' => 'ภูเก็ต', 'name_en' => 'Phuket'],
            ['code' => '48', 'abbrv' => 'PRA', 'name_th' => 'ปราจีนบุรี', 'name_en' => 'Prachin Buri'],
            ['code' => '49', 'abbrv' => 'PKK', 'name_th' => 'ประจวบคีรีขันธ์', 'name_en' => 'Prachuap Khiri Khan'],
            ['code' => '50', 'abbrv' => 'RAN', 'name_th' => 'ระนอง', 'name_en' => 'Ranong'],
            ['code' => '51', 'abbrv' => 'RAY', 'name_th' => 'ระยอง', 'name_en' => 'Rayong'],
            ['code' => '52', 'abbrv' => 'SAK', 'name_th' => 'สกลนคร', 'name_en' => 'Sakon Nakhon'],
            ['code' => '53', 'abbrv' => 'SRI', 'name_th' => 'ศรีสะเกษ', 'name_en' => 'Si Sa Ket'],
            ['code' => '54', 'abbrv' => 'SAM', 'name_th' => 'สมุทรปราการ', 'name_en' => 'Samut Prakan'],
            ['code' => '55', 'abbrv' => 'SMR', 'name_th' => 'สมุทรสงคราม', 'name_en' => 'Samut Songkhram'],
            ['code' => '56', 'abbrv' => 'SMT', 'name_th' => 'สมุทรสาคร', 'name_en' => 'Samut Sakhon'],
            ['code' => '57', 'abbrv' => 'SUK', 'name_th' => 'สุโขทัย', 'name_en' => 'Sukhothai'],
            ['code' => '58', 'abbrv' => 'SUN', 'name_th' => 'สุพรรณบุรี', 'name_en' => 'Suphan Buri'],
            ['code' => '59', 'abbrv' => 'TAK', 'name_th' => 'ตาก', 'name_en' => 'Tak'],
            ['code' => '60', 'abbrv' => 'TRAT', 'name_th' => 'ตราด', 'name_en' => 'Trat'],
            ['code' => '61', 'abbrv' => 'UBON', 'name_th' => 'อุบลราชธานี', 'name_en' => 'Ubon Ratchathani'],
            ['code' => '62', 'abbrv' => 'UDON', 'name_th' => 'อุดรธานี', 'name_en' => 'Udon Thani'],
            ['code' => '63', 'abbrv' => 'YALA', 'name_th' => 'ยะลา', 'name_en' => 'Yala'],
            ['code' => '64', 'abbrv' => 'YAS', 'name_th' => 'ยโสธร', 'name_en' => 'Yasothon'],
            ['code' => '65', 'abbrv' => 'NAN', 'name_th' => 'น่าน', 'name_en' => 'Nan'],
            ['code' => '66', 'abbrv' => 'NAR', 'name_th' => 'นราธิวาส', 'name_en' => 'Narathiwat'],
            ['code' => '67', 'abbrv' => 'NBL', 'name_th' => 'หนองบัวลำภู', 'name_en' => 'Nong Bua Lam Phu'],
            ['code' => '68', 'abbrv' => 'NKH', 'name_th' => 'หนองคาย', 'name_en' => 'Nong Khai'],
            ['code' => '69', 'abbrv' => 'NTB', 'name_th' => 'นนทบุรี', 'name_en' => 'Nonthaburi'],
            ['code' => '70', 'abbrv' => 'PTH', 'name_th' => 'ปทุมธานี', 'name_en' => 'Pathum Thani'],
            ['code' => '71', 'abbrv' => 'PAT', 'name_th' => 'ปัตตานี', 'name_en' => 'Pattani'],
            ['code' => '72', 'abbrv' => 'PNG', 'name_th' => 'พังงา', 'name_en' => 'Phang Nga'],
            ['code' => '73', 'abbrv' => 'PTL', 'name_th' => 'พัทลุง', 'name_en' => 'Phatthalung'],
            ['code' => '74', 'abbrv' => 'PHY', 'name_th' => 'พะเยา', 'name_en' => 'Phayao'],
            ['code' => '75', 'abbrv' => 'PBU', 'name_th' => 'เพชรบูรณ์', 'name_en' => 'Phetchabun'],
            ['code' => '76', 'abbrv' => 'PBI', 'name_th' => 'เพชรบุรี', 'name_en' => 'Phetchaburi'],
            ['code' => '77', 'abbrv' => 'PIT', 'name_th' => 'พิชิต', 'name_en' => 'Phichit'],
        ]);
    }
}