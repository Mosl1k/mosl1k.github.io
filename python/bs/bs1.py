from bs4 import BeautifulSoup
 
with open("http://3k.mail.ru/effect_info.php?nick=%C4%E6%E0 4-20", "r") as f:
    
    contents = f.read()
 
    soup = BeautifulSoup(contents, 'lxml')
            
    for child in soup.recursiveChildGenerator():
        
        if child.name:
            
            print(child.name)
