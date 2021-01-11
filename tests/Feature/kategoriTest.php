<?php

namespace Tests\Feature;

use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Model\Kategori;
class kategoriTest extends TestCase
{
    // use RefreshDatabase;
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

    /** @test */
    public function user_menampilkan_kategori_ress_403()
    {
        $ress=$this->actingAs($this->user(),'api')
            ->get('/api/index-kategori');
        $ress->assertStatus(403);
    }
    /** @test */
    public function admin_menampilkan_kategori_ress_200()
    {
        $ress=$this->actingAs($this->admin(),'api')
            ->get('/api/index-kategori');
        $ress->assertStatus(200);
    }

    /** @test */
    public function admin_menambahkan_kategori()
    {
        $data=$this->data();
        $data['nama']=Str::random(10);
        $ress=$this->actingAs($this->admin(),'api')
            ->post('/api/index-kategori',$data);
        $ress->assertStatus(201);
    }
    /** @test */
    public function admin_menambahkan_kategori_nama_sama()
    {
        $arrayData=[];
        $data=$this->data();
        array_push($arrayData,$data);
        array_push($arrayData,$data);
        $ress=$this->actingAs($this->admin(),'api')
            ->post('/api/index-kategori',$arrayData);
        $ress->assertStatus(302);
    }

    /** @test */
    public function admin_menambahkan_kategori_nama_kosong()
    {
        $data=$this->data();
        $data['nama']=' ';
        $ress=$this->actingAs($this->admin(),'api')
            ->post('/api/index-kategori',$data);
        $ress->assertStatus(302);
    }

    /** @test */
    public function admin_mengubah_kategori()
    {
        $kategori=Kategori::get()->first();
        $dataGanti['nama']='ini telah diganto';
        $update=$this->actingAs($this->admin(),'api')
            ->put('/api/index-kategori/'.$kategori->kd_kategori,$dataGanti);
        $update->assertStatus(200);
    }

    /** @test */
    public function admin_menghapus_kategori()
    {
        $kategori=Kategori::get()->first();
        $update=$this->actingAs($this->admin(),'api')
            ->delete('/api/index-kategori/'.$kategori->kd_kategori);
        $update->assertStatus(200);
    }

    public function data()
    {
        return [
            'nama'=>Str::random(19),
            'kd_user'=>rand(0,99999),
        ];
    }


}
