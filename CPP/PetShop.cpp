/* Saya Yusrilia Hidayanti dengan NIM 2306828 mengerjakan 
Latihan Modul 1 dalam mata kuliah Desain dan Pemrograman
Berorientasi Objek untuk keberkahanNya maka saya tidak 
melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. */

#include <iostream>
#include <string>

using namespace std;

class PetShop {
    private:
    // buat atribut yang dibutuhkan
        int id;
        string nama;
        string kategori;
        double harga;

    public:
        PetShop(){ // konsruktor default (kosong)
            this->id = 0;
            this->nama = "";
            this->kategori = "";
            this->harga = 0;
        }

        PetShop(int id, string nama, string kategori, double harga){ // konstruktor dengan parameter
            this->id = id;
            this->nama = nama;
            this->kategori = kategori;
            this->harga = harga;
        }

        void setID(int id){ // ID setter
            this->id = id;
        }
        void setNama(string nama){ // nama setter
            this->nama = nama;
        }
        void setKategori(string kategori){ // kategori setter
            this->kategori = kategori;
        }
        void setHarga(double harga){ // harga setter
            this->harga = harga;
        }

        int getID(){ // ID getter
            return this->id;
        }
        string getNama(){ // nama getter
            return this->nama;
        }
        string getKategori(){ // kategori getter
            return this->kategori;
        }
        double getHarga(){ // harga getter
            return this->harga;
        }

        void printPetShop(){ // method untuk menampilkan data produk
            cout << "ID: " << this->id << " | ";
            cout << "Nama: " << this->nama << " | ";
            cout << "Kategori: " << this->kategori << " | ";
            cout << "Harga: " << this->harga << endl;
        }

    

        ~PetShop(){
        }


};