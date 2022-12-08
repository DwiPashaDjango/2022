#include <iostream>
using namespace std;

int main(int argc, char const *argv[])
{
    // deklarasi variable
    int bill, x=0, akhir, awal;

    // input bilangan yang ingin di tentukan nilai awal dan akhir
    cout << "Masukan Bilangan : ";
    cin >> bill;

    // looping billangan yang sudah di masukan
    while (bill != 0) // jika bilangan bukan sama dengan 0 
    {
        if (x == 0) // jika bilangan sama dengan 0
        {
            akhir = bill % 10;
            x++;
        }
        awal = bill % 10;
        bill = bill / 10;
    }

    cout << "Digit Akhir : " << akhir << endl;
    cout << "Digit Awal  : " << awal << endl;
    
    return 0;
}