#include <QCoreApplication>
#include <iostream>

using namespace std;

int main(int argc, char *argv[])
{
    QCoreApplication a(argc, argv);
//    int  str;
    char sym;
    for( sym ='A'; sym<'E'; sym++){
           cout << sym ; cout <<" ";
    }



//    for( sym='A', str=5;sym <='E' , str<=5; sym++, str++){
//        for( int stol=-1 ; stol<str; stol++ ){
//        if (sym='A')
//             cout  << sym << endl;
//        cout << sym ;cout <<" ";
// }
//                               cout<< endl;
//            for(char sym='A'; sym <'E' -str ; sym++){
//                cout << sym ;cout << " ";
//}
//}
//        cout<< endl;
//for(int stol1=-1 ; stol1<str1; stol1++ ){
//        int x=1;
//        for(str1=1; str1<6; str1++){
//             for(char sym1='A'; sym1 <='E'+x-1 ; sym1++){
//                 for (int x=1; x<6; x++){
//                     cout << "  ";
//}
//                 cout << sym1 ;
//                  cout << " ";
//             }
//             cout<< endl;
//             }
//}

    return a.exec();
}
