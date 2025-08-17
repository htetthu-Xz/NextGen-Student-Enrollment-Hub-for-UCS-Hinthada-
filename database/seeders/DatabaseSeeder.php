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
            'title' => ' ပညာသင်နှစ် ၂၀၂၅-၂၀၂၆ သင်တန်းများအတွက် သင်တန်းစရိတ်များ',
            "text" => "၂၀၂၅-၂၀၂၆ ပညာသင်နှစ်အတွက် ပထမနှစ်သင်တန်းစရိတ်-(35000)ကျပ်၊ 
                        ဒုတိယနှစ်သင်တန်းစရိတ်-(38000)ကျပ်၊ တတိယနှစ်သင်တန်းစရိတ်-(40000)ကျပ်၊ 
                        စတုတ္ထနှစ်သင်တန်းစရိတ်-(45000)ကျပ်၊ ပဉ္စမနှစ်သင်တန်းစရိတ်-(55000)ကျပ် တိုကို 
                        ကျောင်းသားကျောင်းသူများက မိမိတို၏သင်တန်းနှစ်အလိုက် ကျသင့်သော သင်တန်းစရိတ်များကို 
                        သင်တန်းရေးရာဌာနသို (၃၁.၇.၂၀၂၅)ရက်နေ့ နောက်ဆုံးထား၍ ငွေသွင်းချလံဖြင့် ငွေပေးချေနိုင်ပါသည်။
                        ငွေပေးချေရန် ဖုန်းနံပါတ် 09783543903"
        ]);
    }
}
