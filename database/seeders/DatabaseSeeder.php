<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Notice;
use App\Models\Semester;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            SemesterSeeder::class
        ]);

        User::create([
            'name' => 'Admin',
            'uuid' => Str::uuid(),
            'email' => 'admin@ucsh.edu.mm',
            'role' => 'admin',
            'password' => 'P@ssw0rd',
            'image' => 'logo.jpg',
            'uni_Id_no' => 'CU(Hinthada)' . rand(0000, 9999),
        ]);

        User::create([
            'name' => 'Mu Yar',
            'uuid' => Str::uuid(),
            'email' => 'myyar@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၇၆၈၈၉",
            'password' => 'P@ssw0rd',
            'image' => 'logo.jpg',
            'uni_Id_no' => 'CU(Hinthada)8885',
        ]);
        User::create([
            'name' => 'Aye Aye',
            'uuid' => Str::uuid(),
            'email' => 'ayeaye@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၅၇၉၁၀",
            'password' => 'P@ssw0rd',
            'image' => 'default.jpg',
            'uni_Id_no' => 'CU(Hinthada)8881',
        ]);
        User::create([
            'name' => 'Zaw Aung',
            'uuid' => Str::uuid(),
            'email' => 'zawaung@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၃၈၆၂၁",
            'password' => 'P@ssw0rd',
            'image' => 'default.jpg',
            'uni_Id_no' => 'CU(Hinthada)1108',
        ]);
        User::create([
            'name' => 'Ei Phyu',
            'uuid' => Str::uuid(),
            'email' => 'eiphyu@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၇၈၃၈၄",
            'password' => 'P@ssw0rd',
            'image' => 'default.jpg',
            'uni_Id_no' => 'CU(Hinthada)8918',
        ]);
        User::create([
            'name' => 'Zoe Lay',
            'uuid' => Str::uuid(),
            'email' => 'zoelay@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၅၇၆၉၀",
            'password' => 'P@ssw0rd',
            'image' => 'default.jpg',
            'uni_Id_no' => 'CU(Hinthada)8917',
        ]);
        User::create([
            'name' => 'Khant Bo',
            'uuid' => Str::uuid(),
            'email' => 'khantbo@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၈၂၇၁၆",
            'password' => 'P@ssw0rd',
            'image' => 'default.jpg',
            'uni_Id_no' => 'CU(Hinthada)8913',
        ]);
        User::create([
            'name' => 'Amy',
            'uuid' => Str::uuid(),
            'email' => 'amy@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၃၂၉၄၁",
            'password' => 'P@ssw0rd',
            'image' => 'default.jpg',
            'uni_Id_no' => 'CU(Hinthada)8912',
        ]);
        User::create([
            'name' => 'Si Si',
            'uuid' => Str::uuid(),
            'email' => 'sisi@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၆၄၇၉၈",
            'password' => 'P@ssw0rd',
            'image' => 'default.jpg',
            'uni_Id_no' => 'CU(Hinthada)8904',
        ]);
        User::create([
            'name' => 'Dee Dee',
            'uuid' => Str::uuid(),
            'email' => 'deedee@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၅၃၃၈၅",
            'password' => 'P@ssw0rd',
            'image' => 'default.jpg',
            'uni_Id_no' => 'CU(Hinthada)8903',
        ]);

        User::create([
            'name' => 'Student-9',
            'uuid' => Str::uuid(),
            'email' => 'student_9@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၇၆၃၂၉",
            'password' => 'P@ssw0rd',
            'image' => 'logo.jpg',
            'uni_Id_no' => 'CU(Hinthada)' . rand(0000, 9999),
        ]);

        User::create([
            'name' => 'Student-2',
            'uuid' => Str::uuid(),
            'email' => 'student_2@ucsh.edu.mm',
            'role' => 'user',
            //'sch_no'=>"၀၇၆၃၂၉",
            'password' => 'P@ssw0rd',
            'image' => 'logo.jpg',
            'uni_Id_no' => 'CU(Hinthada)' . rand(0000, 9999),
        ]);

        AcademicYear::create([
            "name" => "ပထမနှစ် ပထမနှစ်ဝက်",
            "enrollment" => 35000,
            "ename" => "First Year",
            "esemester" => "First Semester"
        ]);

        AcademicYear::create([
            "name" => "ပထမနှစ် ဒုတိယနှစ်ဝက်",
            "enrollment" => 0,
            "ename" => "First Year",
            "esemester" => "Second Semester"
        ]);

        AcademicYear::create([
            "name" => "ဒုတိယနှစ် ပထမနှစ်ဝက်",
            "enrollment" => 38000,
            "ename" => "Second Year",
            "esemester" => "First Semester"
        ]);

        AcademicYear::create([
            "name" => "ဒုတိယနှစ် ဒုတိယနှစ်ဝက်",
            "enrollment" => 0,
            "ename" => "Second Year",
            "esemester" => "Second Semester"
        ]);

        AcademicYear::create([
            "name" => "တတိယနှစ် ပထမနှစ်ဝက်",
            "enrollment" => 40000,
            "ename" => "Third Year",
            "esemester" => "First Semester"
        ]);

        AcademicYear::create([
            "name" => "တတိယနှစ် ဒုတိယနှစ်ဝက်",
            "enrollment" => 0,
            "ename" => "Third Year",
            "esemester" => "Second Semester"
        ]);
        AcademicYear::create([
            "name" => "စတုတ္ထနှစ် ပထမနှစ်ဝက်",
            "enrollment" => 45000,
            "ename" => "Fourth Year",
            "esemester" => "First Semester"
        ]);

        AcademicYear::create([
            "name" => "စတုတ္ထနှစ် ဒုတိယနှစ်ဝက်",
            "enrollment" => 0,
            "ename" => "Fourth Year",
            "esemester" => "Second Semester"
        ]);

        AcademicYear::create([
            "name" => "ပဉ္စမနှစ် ပထမနှစ်ဝက်",
            "enrollment" => 55000,
            "ename" => "Fifth Year",
            "esemester" => "First Semester"
        ]);
        AcademicYear::create([
            "name" => "ပဉ္စမနှစ် ဒုတိယနှစ်ဝက်",
            "enrollment" => 0,
            "ename" => "Fifth Year",
            "esemester" => "Second Semester"
        ]);
        Notice::create([
            "image" => "logo.png",
            "text" => "ကွန်ပျူတာတက္ကသိုလ်(ဟင်္သာတ)၂၀၂၅-၂၀၂၆ ပညာသင်နှစ်ပထမနှစ်၊ ဒုတိယနှစ်၊ တတိယနှစ်၊ စတုတ္ထနှစ်နှင့် D.C.Sc.(ပထမနှစ်ဝက်နှင့် ဒုတိယနှစ်ဝက်)သင်တန်းများအားလုံးကျောင်းအပ်စတင်လက်ခံမည့်ရက်		-၂၇.၅.၂၀၂၅ (၂ပတ်အတွင်းကျောင်းအပ်ရန်)
            ကျောင်းစတင်ဖွင့်လှစ်မည့်ရက်	-၃.၆.၂၀၂၅"
        ]);
        Notice::create([
            "image" => "logo.png",
            "text" => "တတိယနှစ်(ပထမနှစ်ဝက်)သင်တန်း ကျောင်းအပ်ရန်အတွက်
    လိုအပ်သောစာရွက်စာတမ်းများ
    ၁။ တက္ကသိုလ်ဝင်စာမေးပွဲအောင်လက်မှတ်မိတ္တူ (၁)စုံ
    ၂။ အိမ်ထောင်စုစာရင်းမိတ္တူ(၁)စုံ
    ၃။ (၆)လအတွင်းရိုက်ကူးထားသောပတ်စပို့ဓါတ်ပုံ(အင်္ကျီအဖြူ)	(၅)ပုံ
    ၄။ မှတ်ပုံတင်မိတ္တူ (ကျောင်းသားနှင့်မိဘ(၂)ဦး)(၁)စုံ
    ၅။ ကိုဗစ်ကာကွယ်ဆေးထိုးမှတ်တမ်းမိတ္တူ (၁)စုံ"
        ]);
        Notice::create([
            "image" => "logo.png",
            "text" => "ကျောင်းအပ်ရန်အတွက်လိုအပ်သောစာရွက်စာတမ်းများ(ဒုတိယနှစ်မှ နောက်ဆုံးနှစ်ထိ)

    ၁။ သန်းခေါင်စာရင်းမိတ္တူ(၁)စုံ
    ၂။ (၆)လအတွင်းရိုက်ကူးထားသောပတ်စပို့ဓါတ်ပုံ(အင်္ကျီအဖြူ)	(၅)ပုံ
    ၃။ မှတ်ပုံတင်မိတ္တူ (ကျောင်းသားနှင့်မိဘ(၂)ဦး)(၁)စုံ
    ၄။ ကိုဗစ်ကာကွယ်ဆေးထိုးမှတ်တမ်း"
        ]);
        Notice::create([
            "image" => "logo.png",
            "text" => "Web Development Training သင်တန်းအား(၁.၈.၂၀၂၅)ရက်နေ့မှစ၍ညနေ(၄း၀၀ )နာရီမှ(၅း၃၀)နာရီအထိဖွင့်လှစ်မည်ဖြစ်ပါသဖြင့်သင်တန်းရေးရာဌာနသို့( ၃၁.၇.၂၀၂၅)ရက်နေ့နောက်ဆုံးထား၍စာရင်းပေးသွင်းနိုင်ပါသည်"
        ]);
    }
}
