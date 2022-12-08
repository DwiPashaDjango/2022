import java.util.Scanner;

class DataDiri {
    public static void main(String[] args) {
        //variable
        String nama, alamat, prodi;
        int nim, telp;

        Scanner write = new Scanner(System.in);

        // input data
        System.out.print("Masukan Nama : ");
        nama = write.next();
        System.out.print("Masukan Prodi : ");
        prodi = write.next();
        System.out.print("Masukan Alamat : ");
        alamat = write.next();
        System.out.print("Masukan NIM :");
        nim = write.nextInt();
        System.out.print("Masukan no Telephone :");
        telp = write.nextInt();

        // output data
        System.out.println("Nama : " + nama);
        System.out.println("Prodi : " + prodi);
        System.out.println("Alamat : " + alamat);
        System.out.println("NIM : " + nim);
        System.out.println("telp : " + telp);
    }
}