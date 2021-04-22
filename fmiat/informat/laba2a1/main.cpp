#include <iostream>
#include <math.h>
#include <iomanip>
using namespace std;
#define A -5 // минимум х
#define B 5 // максимум х
double F(double x) // "y = "
{
return x * exp(x) + (2*sin(x)) - sqrt(abs((pow(x,3) - pow(x,2))));
}

int main()
{
    int n,count=0;
    double x, y,h;
    cout <<"n = "; cin >> n; //количество строк в таблице
    h=(B-A)/(n-1);
    for(x=A;x<=B;x+=h)
    {
        y = F(x);
        cout<<setprecision(4)<<fixed<<x<<" "<<y <<endl;
        if (x >= -9 && x <= 2 && y >= -10 && y <= 2)
        count++;
    }
    cout << "count = "<< count << endl;


    //system("pause");
return 0;
}

