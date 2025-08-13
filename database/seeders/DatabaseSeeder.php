<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Notice;
use App\Models\Semester;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Database\Seeders\StudentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            SemesterSeeder::class,
            StudentSeeder::class,
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
            'title' => 'ပညာသင်နှစ် ၂၀၂၅-၂၀၂၆ သင်တန်းများအတွက် ကျောင်းအပ်ခြင်း',
            "text" => "ကွန်ပျူတာတက္ကသိုလ်(ဟင်္သာတ)၂၀၂၅-၂၀၂၆ ပညာသင်နှစ်ပထမနှစ်၊ ဒုတိယနှစ်၊ တတိယနှစ်၊ စတုတ္ထနှစ်နှင့် D.C.Sc.(ပထမနှစ်ဝက်နှင့် ဒုတိယနှစ်ဝက်)သင်တန်းများအားလုံးကျောင်းအပ်စတင်လက်ခံမည့်ရက်		-၂၇.၅.၂၀၂၅ (၂ပတ်အတွင်းကျောင်းအပ်ရန်)
            ကျောင်းစတင်ဖွင့်လှစ်မည့်ရက်	-၃.၆.၂၀၂၅"
        ]);
        Notice::create([
            "image" => "logo.png",
            'title' => 'ပညာသင်နှစ် ၂၀၂၅-၂၀၂၆ သင်တန်းများအတွက် ကျောင်းအပ်ခြင်း',
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
            'title' => 'ပညာသင်နှစ် ၂၀၂၅-၂၀၂၆ သင်တန်းများအတွက် ကျောင်းအပ်ခြင်း',
            "text" => "ကျောင်းအပ်ရန်အတွက်လိုအပ်သောစာရွက်စာတမ်းများ(ဒုတိယနှစ်မှ နောက်ဆုံးနှစ်ထိ)

    ၁။ သန်းခေါင်စာရင်းမိတ္တူ(၁)စုံ
    ၂။ (၆)လအတွင်းရိုက်ကူးထားသောပတ်စပို့ဓါတ်ပုံ(အင်္ကျီအဖြူ)	(၅)ပုံ
    ၃။ မှတ်ပုံတင်မိတ္တူ (ကျောင်းသားနှင့်မိဘ(၂)ဦး)(၁)စုံ
    ၄။ ကိုဗစ်ကာကွယ်ဆေးထိုးမှတ်တမ်း"
        ]);
        Notice::create([
            "image" => "logo.png",
            'title' => 'ပညာသင်နှစ် ၂၀၂၅-၂၀၂၆ သင်တန်းများအတွက် ကျောင်းအပ်ခြင်း',
            "text" => "Web Development Training သင်တန်းအား(၁.၈.၂၀၂၅)ရက်နေ့မှစ၍ညနေ(၄း၀၀ )နာရီမှ(၅း၃၀)နာရီအထိဖွင့်လှစ်မည်ဖြစ်ပါသဖြင့်သင်တန်းရေးရာဌာနသို့( ၃၁.၇.၂၀၂၅)ရက်နေ့နောက်ဆုံးထား၍စာရင်းပေးသွင်းနိုင်ပါသည်"
        ]);
    }
}
