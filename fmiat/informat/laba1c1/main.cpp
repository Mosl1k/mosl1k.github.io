#include <iostream>
#include <math.h>
#include <iomanip>
using namespace std;
#define A -5 // минимум х
#define B 5 // максимум х
#define H 0.1 // шаг
double F(double x) // "y = "
{
return x * exp(x) + (2*sin(x)) - sqrt(abs((pow(x,3) - pow(x,2))));
}

int main()
{
    int count=0; // счетчик количества значений
    double x, y, min=F(B);
    cout <<"  x     y\n";
    for(x=A; x<=B; x+=H)
    {
        y = F(x);
        if (y>=0&&y<min){ min=y;count++;}
        cout <<setprecision(4)<<fixed<<x<<" "<<y<<endl;
    }
    cout <<"minimum positive value = "<<min<<"\ncount of minimum positive values = "<<count<<endl;
//system("pause");
return 0;
}
