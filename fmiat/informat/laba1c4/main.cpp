#include <cmath>
#include <iostream>
#include <algorithm>
#define H 0.1 //шаг
#define A -1 // минимум x
#define B 1 // максимум x
#define N 10  /* размер массива */
#define M 5 /*количество искомых минимальных элементов */
using namespace std;

double F(double x)
{
return x * exp(x) + (2*sin(x)) - sqrt(abs((pow(x,3) - pow(x,2))));
}
//int C(int q)
//{

//}
int main()
{
    double  x, y,  /* аргумент и значение функции y = F(x) */
            min,   /* минимальное значение функции с точностью H */
            q;       /* целая часть значения функции */
    int n = 0; /* количество значений функции, имеющих четную целую часть */
    min = F(A);    /* начальное значение минимума */

    for(x = A; x <= B; x += H)
    {
        y = F(x);    /* вычисляем значение функции */
        printf("%10.4f  %10.4f\n", x, y); /* выводим значения x и y на экран */
        if (y < min){
            min = y;
        modf(y, &q);
        if ((int)q % 2 == 0 && q != 0 && (int)q < 0)
              n++;
    }
    printf("min = %.4f\n", min);
    printf("n = %d\n", n);


return 0;
}










//    int count=0, count_chet=0,a=-5;
//double x, y, sum=0.0;
//for(x = A; x <= B; x += H)
//{
//y = F(x);
//a = F(x);

//printf("%10.4f %10.4f;\n", x, y);
//count++;
//sum += y;
//int min = y;
//if ((a % 2) == 0 && a < y ){
//    cout << min << endl;
//    count_chet++;
//cout << count_chet << endl;
//}
//}
////if (count == 0)
////puts("count = 0");

//cout << a << endl;
//count--; // без учета нуля
//printf("sred = %10.4f\n", sum/count);

//return 0;
//}
