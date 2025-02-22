class PetShop:
    def __init__(self, id=0, nama="", kategori="", harga=0.0):
        # inisialisasi atribut
        self.id = id
        self.nama = nama
        self.kategori = kategori
        self.harga = harga

    # setter dan getter:
    def setID(self, id):
        self.id = id

    def setNama(self, nama):
        self.nama = nama

    def setKategori(self, kategori):
        self.kategori = kategori

    def setHarga(self, harga):
        self.harga = harga

    def getID(self):
        return self.id

    def getNama(self):
        return self.nama

    def getKategori(self):
        return self.kategori

    def getHarga(self):
        return self.harga

    # method untuk menampilkan data produk
    def printPetShop(self):
        print(f"ID: {self.id} | Nama: {self.nama} | Kategori: {self.kategori} | Harga: {self.harga}")
