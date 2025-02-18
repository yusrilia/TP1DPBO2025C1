import java.util.ArrayList;
import java.util.Scanner;

class PetShop {
    private int id;
    private String nama;
    private String kategori;
    private double harga;

    public PetShop() {
        this.id = 0;
        this.nama = "";
        this.kategori = "";
        this.harga = 0;
    }

    public PetShop(int id, String nama, String kategori, double harga) {
        this.id = id;
        this.nama = nama;
        this.kategori = kategori;
        this.harga = harga;
    }

    public void setID(int id) { this.id = id; }
    public void setNama(String nama) { this.nama = nama; }
    public void setKategori(String kategori) { this.kategori = kategori; }
    public void setHarga(double harga) { this.harga = harga; }

    public int getID() { return this.id; }
    public String getNama() { return this.nama; }
    public String getKategori() { return this.kategori; }
    public double getHarga() { return this.harga; }

    public void printPetShop() {
        System.out.println("ID: " + this.id + " | Nama: " + this.nama + " | Kategori: " + this.kategori + " | Harga: " + this.harga);
    }
}