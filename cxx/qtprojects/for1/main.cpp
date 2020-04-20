#include <QCoreApplication>
#include <iostream>

using namespace std;

int main(int argc, char *argv[])
{
    QCoreApplication a(argc, argv);

 char sym='A', c ='A',l=1,i=1,j=1,k=1, str=1;

   for(; str<6; str++){
    for (; c <'F', sym <='E' -str; sym++,c++,l=k,k=j,j=i,i=c-1){
        cout << c << sym ;
        cout << " "; cout << i ;
        cout << " " ;cout << j;
        cout << " " ;cout << k;
        cout << " " ;cout << l;
//break;
}
    cout<<endl;
     }

 cout<<endl;



     for(; str<6; str++){
          for(char sym='A'; sym <='E' -str; sym++){
               cout << sym ;cout << " ";
               for(;  c <'E'; c++ ){
                   cout << c;
                   cout << " " ;

               }
}
                 cout << endl;

}






    return a.exec();
}
