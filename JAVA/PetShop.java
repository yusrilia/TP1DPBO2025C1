import java.util.ArrayList;
import java.util.Scanner;

class PetShop {
    // atribut privat
    private int id;
    private String nama;
    private String kategori;
    private double harga;

    // konstruktor (kosong)
    public PetShop() {
        this.id = 0;
        this.nama = "";
        this.kategori = "";
        this.harga = 0;
    }

    // konstruktor (isi)
    public PetShop(int id, String nama, String kategori, double harga) {
        this.id = id;
        this.nama = nama;
        this.kategori = kategori;
        this.harga = harga;
    }

    // setter dan getter
    public void setID(int id) { this.id = id; }
    public void setNama(String nama) { this.nama = nama; }
    public void setKategori(String kategori) { this.kategori = kategori; }
    public void setHarga(double harga) { this.harga = harga; }
    public int getID() { return this.id; }
    public String getNama() { return this.nama; }
    public String getKategori() { return this.kategori; }
    public double getHarga() { return this.harga; }

    // method untuk menampilkan data petshop
    public void printPetShop() {
        System.out.println("ID: " + this.id + " | Nama: " + this.nama + " | Kategori: " + this.kategori + " | Harga: " + this.harga);
    }
}