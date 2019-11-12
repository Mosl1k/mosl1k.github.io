#include <stdio.h>
#include <math.h>
#define A -3.0
#define B 3.0
#define H 0.2
//double sin;
/* функция F() вычисляет значение функции y = sin(x)+x 2 в точке x */
double F(double x)
{
return sin(x) + x*x;
}
int main( )
{
double x, y, sum;
int count;
sum = count = 0;
for(x = A; x <= B; x += H)
{
y = F(x);
printf("%10.4f %10.4f\n", x, y);
if (y > x*x)
{
count++;
sum += y;
}
}
if (count == 0)
puts("count = 0");
else printf("sred = %10.4f\n", sum/count);
return 0;
}