#include <iostream>
#include <string>

using namespace std;

class PetShop {
    /*
    ID
Nama produk
Kategori produk
Harga produk

*/
    private:
        int id;
        string nama;
        string kategori;
        double harga;

    public:
        PetShop(){
            this->id = 0;
            this->nama = "";
            this->kategori = "";
            this->harga = 0;
        }

        PetShop(int id, string nama, string kategori, double harga){
            this->id = id;
            this->nama = nama;
            this->kategori = kategori;
            this->harga = harga;
        }

        void setID(int id){
            this->id = id;
        }
        void setNama(string nama){
            this->nama = nama;
        }
        void setKategori(string kategori){
            this->kategori = kategori;
        }
        void setHarga(double harga){
            this->harga = harga;
        }

        int getID(){
            return this->id;
        }
        string getNama(){
            return this->nama;
        }
        string getKategori(){
            return this->kategori;
        }
        double getHarga(){
            return this->harga;
        }

        

        
        void tampil(int id){
            cout << "ID: " << id << endl;
            cout << "Nama: " << nama << endl;
            cout << "Kategori: " << kategori << endl;
            cout << "Harga: " << harga << endl;
        }

        ~PetShop(){
        }
    /*
    menampilkan
    menambahkan
    mengubah
    menghapus
    mencari
    */


};