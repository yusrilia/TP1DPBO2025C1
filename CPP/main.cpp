/* Saya Yusrilia Hidayanti dengan NIM 2306828 mengerjakan 
Latihan Modul 1 dalam mata kuliah Desain dan Pemrograman
Berorientasi Objek untuk keberkahanNya maka saya tidak 
melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. */

#include <bits/stdc++.h>
#include "PetShop.cpp"
using namespace std;

int main(){
    int n;  // variabel untuk menyimpan jumlah produk    
    // variabel temporary untuk menyimpan data produk:
    int id_tmp;
    string nama_tmp, kat_tmp;
    double harga_tmp;
    list<PetShop> produk; // deklarasi list produk
    
    // menambahkan data produk
    cout << "-->> Menambahkan Data produk: " << endl;
    cout << "-->> Berapa produk yang akan ditambahkan? " << endl;
    cin >> n; // masukkan jumlah produk yang akan diinput
    for(int i = 0; i < n; i++){
        cout << "-->> Masukkan data produk ke-" << i+1 << " (nama, kategori, harga)" << endl;
        cin >> nama_tmp >> kat_tmp >> harga_tmp; // input data produk        
        PetShop p(i+1, nama_tmp, kat_tmp, harga_tmp); // buat objek produk baru
        produk.push_back(p); // tambahkan produk ke list

    }

    // menampilkan data produk
    cout << endl;
    cout << "-->> Menampilkan Data produk: " << endl;
    for(auto it = produk.begin(); it != produk.end(); it++){
        it->printPetShop(); // tampilkan data produk
    }

    // mengubah data produk
    cout << endl;
    cout << "-->> Mengubah Data produk: " << endl;
    cout << "-->> Masukkan ID produk yang akan diubah: " << endl;
    cin >> id_tmp; // masukkan ID produk yang akan diubah
    cout << "-->> Masukkan data produk yang baru: (nama, kategori, harga)" << endl;
    cin >> nama_tmp >> kat_tmp >> harga_tmp; // input data produk yang baru
    for(auto it = produk.begin(); it != produk.end(); it++){
        if(it->getID() == id_tmp){
            it->setNama(nama_tmp); // ubah nama produk
            it->setKategori(kat_tmp); // ubah kategori produk
            it->setHarga(harga_tmp); // ubah harga produk
        }
    }
    
    // tampilkan data produk
    cout << endl;
    cout << "-->> Menampilkan Data produk sesudah diubah: " << endl;
    for(auto it = produk.begin(); it != produk.end(); it++){
        it->printPetShop(); // tampilkan data produk
    }

    // menghapus data produk
    cout << endl;
    cout << "-->> Menghapus Data produk: " << endl;
    cout << "-->> Masukkan ID produk yang akan dihapus: " << endl;
    cin >> id_tmp; // masukkan ID produk yang akan dihapus
    auto it = produk.begin();
    while (it != produk.end()) {
        if (it->getID() == id_tmp) {
            it = produk.erase(it); // Hapus elemen 
        } else {
            ++it; // Lanjut ke elemen berikutnya
        }
    }
    
    // tampilkan data produk
    cout << endl;
    cout << "-->> Menampilkan Data produk sesudah dihapus: " << endl;
    for(auto it = produk.begin(); it != produk.end(); it++){
        it->printPetShop(); // tampilkan data produk
    }
    
    // mencari data produk
    cout << endl;
    cout << "-->> Mencari Data produk: " << endl;
    cout << "-->> Masukkan ID produk yang akan dicari: " << endl;
    cin >> id_tmp; // masukkan ID produk yang akan dicari
    int exist = 0;
    for(auto it = produk.begin(); it != produk.end(); it++){
        if(it->getID() == id_tmp){
            exist = 1;
            it->printPetShop(); // tampilkan data produk
        }
    }
    if(exist == 0){
        cout << "Data tidak ditemukan!" << endl;
    }

}