from PetShop import PetShop

def main():
    produk = []

    # menambahkan produk
    print("-->> Menambahkan Data produk: ")
    n = int(input("-->> Berapa produk yang akan ditambahkan? "))
    # perulangan sebanyak data yang mau dimasukkan
    for i in range(n):
        print(f"-->> Masukkan data produk ke-{i + 1} (nama, kategori, harga)")
        # input data ke tmp
        nama_tmp, kat_tmp, harga_tmp = input().split()
        harga_tmp = float(harga_tmp)
        # membuat objek PetShop
        p = PetShop(i + 1, nama_tmp, kat_tmp, harga_tmp)
        produk +=[p]

    # menampilkan produk
    print("\n-->> Menampilkan Data produk: ")
    for p in produk:
        p.printPetShop()

    # mengubah produk
    print("\n-->> Mengubah Data produk: ")
    id_tmp = int(input("-->> Masukkan ID produk yang akan diubah: "))
    print("-->> Masukkan data produk yang baru: (nama, kategori, harga)")
    # input data baru ke tmp
    nama_tmp, kat_tmp, harga_tmp = input().split()
    harga_tmp = float(harga_tmp)
    # perulangan untuk mencari produk yang akan diubah
    for p in produk:
        if p.getID() == id_tmp: # jika produk ditemukan
            p.setNama(nama_tmp)
            p.setKategori(kat_tmp)
            p.setHarga(harga_tmp)

    # menampilkan produk setelah diubah
    print("\n-->> Menampilkan Data produk sesudah diubah: ")
    for p in produk:
        p.printPetShop()

    # menghapus produk
    print("\n-->> Menghapus Data produk: ")
    id_tmp = int(input("-->> Masukkan ID produk yang akan dihapus: "))
    # menghapus produk dengan cara membuat list baru tanpa produk yang akan dihapus
    produk[:] = [p for p in produk if p.getID() != id_tmp]

    # menampilkan produk setelah dihapus
    print("\n-->> Menampilkan Data produk sesudah dihapus: ")
    for p in produk:
        p.printPetShop()

    # mencari produk
    print("\n-->> Mencari Data produk: ")
    id_tmp = int(input("-->> Masukkan ID produk yang akan dicari: "))
    exist = False # variabel flag
    for p in produk: # perulangan untuk mencari produk
        if p.getID() == id_tmp: # jika produk ditemukan
            exist = True # set flag
            p.printPetShop()
    if not exist:
        print("Data tidak ditemukan!")


if __name__ == "__main__":
    main()