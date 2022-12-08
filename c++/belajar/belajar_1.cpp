#include <iostream>
#include <conio.h>
using namespace std;

int main(int argc, char const *argv[])
{
    // variable dan tipe data
    float luas, x = 3.10;
    int y;

    // input dan output angka yang di masukan
    cout << "Masukan Angka : ";
    cin >> y;

    // menghitung angka yang di masukan oleh user
    luas = x * y * y;

    // output yang akan keluar
    cout << "Luas Lingkaran Adalah : " << luas;

    return 0;
}