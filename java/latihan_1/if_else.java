import java.util.Scanner;;

public class if_else {
    public static void main(String[] args) {
        int belanja, quantity = 0;
        Scanner cek = new Scanner(System.in);

        System.out.println("Total Belanjaan : ");
        belanja = cek.nextInt();
        System.out.println("Total Quantity : ");
        quantity = cek.nextInt();

        if (belanja >= 10000) {
            System.out.println("Total belanjaan Anda Adalah : " + belanja * quantity);
        } else if (belanja <= 10000) {
            System.out.println("Total Belanjaan Anda : " + belanja * quantity);
        } else {
            System.out.println("Thank You!");
        }
    }
}
