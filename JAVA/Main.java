import java.util.ArrayList;
import java.util.Scanner;

class Main {
    public static void main(String[] args) {
        // membuat objek scanner untuk menerima input dari user
        Scanner scanner = new Scanner(System.in);
        // membuat array list untuk menyimpan data produk
        ArrayList<PetShop> produk = new ArrayList<>();

        System.out.println("-->> Berapa produk yang akan ditambahkan?");
        // input jumlah produk
        int n = scanner.nextInt();
        scanner.nextLine();

        // perulangan untuk memasukkan data produk
        for (int i = 0; i < n; i++) {
            System.out.println("-->> Masukkan data produk ke-" + (i + 1) + " (nama, kategori, harga):");
            // input data produk
            String nama = scanner.next();
            String kategori = scanner.next();
            double harga = scanner.nextDouble();
            // membuat objek produk dan menambahkannya ke array list
            produk.add(new PetShop(i + 1, nama, kategori, harga));
        }

        // menampilkan data produk
        System.out.println("\n-->> Menampilkan Data produk:");
        for (PetShop p : produk) {
            p.printPetShop();
        }

        // mengubah data produk
        System.out.println("\n-->> Mengubah Data produk:");
        System.out.println("-->> Masukkan ID produk yang akan diubah:");
        int idUbah = scanner.nextInt();
        System.out.println("-->> Masukkan data produk yang baru (nama, kategori, harga):");
        // input data produk baru
        String namaBaru = scanner.next();
        String kategoriBaru = scanner.next();
        double hargaBaru = scanner.nextDouble();

        // perulangan untuk mengubah data produk
        for (PetShop p : produk) {
            if (p.getID() == idUbah) { // jika ketemu produk yang akan diubah
                p.setNama(namaBaru);
                p.setKategori(kategoriBaru);
                p.setHarga(hargaBaru);
            }
        }

        // menampilkan data produk setelah diubah
        System.out.println("\n-->> Menampilkan Data produk setelah diubah:");
        for (PetShop p : produk) {
            p.printPetShop();
        }

        // menghapus data produk
        System.out.println("\n-->> Menghapus Data produk:");
        System.out.println("-->> Masukkan ID produk yang akan dihapus:");
        int idHapus = scanner.nextInt(); // input id produk yang akan dihapus
        produk.removeIf(p -> p.getID() == idHapus); // menghapus produk

        // menampilkan data produk setelah dihapus
        System.out.println("\n-->> Menampilkan Data produk setelah dihapus:");
        for (PetShop p : produk) {
            p.printPetShop();
        }

        // mencari data produk
        System.out.println("\n-->> Mencari Data produk:");
        System.out.println("-->> Masukkan ID produk yang akan dicari:");
        int idCari = scanner.nextInt(); // input id produk yang akan dicari
        boolean found = false; // variabel flag 

        for (PetShop p : produk) { // perulangan untuk mencari data produk
            if (p.getID() == idCari) { // jika ketemu produk yang dicari
                p.printPetShop();
                found = true; // set flag menjadi true
            }
        }

        if (!found) { // jika flag false (data tidak ditemukan)
            System.out.println("Data tidak ditemukan!");
        }

        scanner.close();
    }
}