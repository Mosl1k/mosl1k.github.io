#include <stdio.h>
#include <math.h>
#define A -3.0
#define B 3.0
double F(double x)
{
return sin(x) + x*x;
}
int main( )
{
double x, y, h;
int count, n;
count = 0;
printf("n = "); scanf("%d", &n); /* количество строк в таблице */
h = (B - A) / (n - 1);
for(x = A; x <= B; x += h)
{
y = F(x);
printf("%10.4f %10.4f\n", x, y);
if (x >= -1 && x <= 5 && y >= -2 && y <= 3)
count++;
}
printf("count = %d\n", count);
return 0;
}
