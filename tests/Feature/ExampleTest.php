<?php

namespace Tests\Feature;

use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
class ExampleTest extends TestCase
{
         use RefreshDatabase;

    public function user()
    {
     return  factory(User::class)->create([
            'akses'=>"client"
        ]);
    }

    public function admin()
    {
     return  factory(User::class)->create([
            'akses'=>5
        ]);
    }
    /**

     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/index-user');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function admin_menampilkan_data_user()
    {
        $response = $this->actingAs($this->admin(),'api')
                    ->get('/api/index-user');
        $response->assertStatus(200);
    }


    /** @test */
    public function user_menampilkan_data_user()
    {
        $response = $this->actingAs($this->user(),'api')
                    ->get('/api/index-user');
        $response->assertStatus(403);
    }


    /** @test */
    public function tamu_melakukan_registrasi_akun()
    {
        $data=$this->data_registtrasi();
        $data['username']=Str::random(8);
        $response=$this->post('/api/daftar',$data);
        $response->assertStatus(200);
    }


    /** @test */
    public function tamu_registrasi_dengan_username_yang_sama()
    {
        $arrayData=[];
        $data=$this->data_registtrasi();
        array_push($arrayData,$data);
        array_push($arrayData,$data);
        $response=$this->post('/api/daftar',$arrayData);
        $response->assertStatus(302);
    }


    /** @test */
    public function ketika_nama_kosong()
    {
        $data=$this->data_registtrasi();
        unset($data['nama']);
        $response=$this->post('/api/daftar',$data);
        $response->assertStatus(302);
        // $this->assertCount(1, User::all());
    }

    /** @test */
    public function ketika_email_kosong()
    {
        $data=$this->data_registtrasi();
        unset($data['nama']);
        $response=$this->post('/api/daftar',$data);
        $response->assertStatus(302);
    }

    /** @test */
    public function ketika_username_kosong()
    {
        $data=$this->data_registtrasi();
        unset($data['nama']);
        $response=$this->post('/api/daftar',$data);
        $response->assertStatus(302);
    }

    private function data_registtrasi()
    {
        return [
            'nama'=>'indikasi',
            'email'=>'tesitng@gmail.com',
            'username'=>'fahmi',
            'password'=>'admin1',
        ];
    }

}
