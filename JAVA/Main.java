import java.util.ArrayList;
import java.util.Scanner;

class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<PetShop> produk = new ArrayList<>();

        System.out.println("-->> Berapa produk yang akan ditambahkan?");
        int n = scanner.nextInt();
        scanner.nextLine();

        for (int i = 0; i < n; i++) {
            System.out.println("-->> Masukkan data produk ke-" + (i + 1) + " (nama, kategori, harga):");
            String nama = scanner.next();
            String kategori = scanner.next();
            double harga = scanner.nextDouble();
            produk.add(new PetShop(i + 1, nama, kategori, harga));
        }

        System.out.println("\n-->> Menampilkan Data produk:");
        for (PetShop p : produk) {
            p.printPetShop();
        }

        System.out.println("\n-->> Mengubah Data produk:");
        System.out.println("-->> Masukkan ID produk yang akan diubah:");
        int idUbah = scanner.nextInt();
        System.out.println("-->> Masukkan data produk yang baru (nama, kategori, harga):");
        String namaBaru = scanner.next();
        String kategoriBaru = scanner.next();
        double hargaBaru = scanner.nextDouble();

        for (PetShop p : produk) {
            if (p.getID() == idUbah) {
                p.setNama(namaBaru);
                p.setKategori(kategoriBaru);
                p.setHarga(hargaBaru);
            }
        }

        System.out.println("\n-->> Menampilkan Data produk setelah diubah:");
        for (PetShop p : produk) {
            p.printPetShop();
        }

        System.out.println("\n-->> Menghapus Data produk:");
        System.out.println("-->> Masukkan ID produk yang akan dihapus:");
        int idHapus = scanner.nextInt();
        produk.removeIf(p -> p.getID() == idHapus);

        System.out.println("\n-->> Menampilkan Data produk setelah dihapus:");
        for (PetShop p : produk) {
            p.printPetShop();
        }

        System.out.println("\n-->> Mencari Data produk:");
        System.out.println("-->> Masukkan ID produk yang akan dicari:");
        int idCari = scanner.nextInt();
        boolean found = false;

        for (PetShop p : produk) {
            if (p.getID() == idCari) {
                p.printPetShop();
                found = true;
            }
        }

        if (!found) {
            System.out.println("Data tidak ditemukan!");
        }

        scanner.close();
    }
}