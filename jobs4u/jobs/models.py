from django.db import models

# Create your models here.
class Adress(models.Model): 
    States_Short = [
        ('AC','Acre'),
        ('AL','Alagoas'),
        ('AP','Amapá'),
        ('AM','Amazonas'),
        ('BA','Bahia'),
        ('CE','Ceará'),
        ('DF','Distrito Federal'),
        ('ES','Espírito Santo'),
        ('GO','Goiás'),
        ('MA','Maranhão'),
        ('MT','Mato Grosso'),
        ('MS','Mato Grosso do Sul'),
        ('MG','Minas Gerais'),
        ('PA','Pará'),
        ('PB','Paraíba'),
        ('PR','Paraná'),
        ('PE','Pernambuco'),
        ('PI','Piauí'),
        ('RR','Roraima'),
        ('RO','Rondônia'),
        ('RJ','Rio de Janeiro'),
        ('RN','Rio Grande do Norte'),
        ('RS','Rio Grande do Sul'),
        ('SC','Santa Catarina'),
        ('SP','São Paulo'),
        ('SE','Sergipe'),
        ('TO','Tocantins')
    ]
    street      = models.CharField(max_length=45)
    number      = models.CharField(max_length=10)
    postal_code = models.CharField(max_length=8)
    complement  = models.CharField(max_length=16, blank=True)
    city        = models.CharField(max_length=40)
    state       = models.CharField(max_length=2, choices=States_Short)


    def __str__(self):
        return "{}, {} | {} - {}".format(self.street, self.number, self.city, self.state)


class Workers(models.Model): 
    
    cpf      = models.CharField(max_length=11, primary_key=True)
    name     = models.CharField(max_length=24)
    surname  = models.CharField(max_length=30)
    email    = models.EmailField()
    passwork= models.CharField(max_length=60)
    adress   = models.ForeignKey(Adress, on_delete=models.CASCADE)

    def save(self, *args, **kwargs):
        if len(self.cpf) != 11:
            return 
        else:
            super().save(*args, **kwargs)

    def __str__(self):
        return self.name

class Phone(models.Model): 
    number  = models.CharField(max_length=9)
    ddd     = models.CharField(max_length=2)
    isWP    = models.BooleanField()
    workers = models.ForeignKey(Workers, on_delete=models.CASCADE)

class Categories(models.Model): 
    name        = models.CharField(max_length=60)
    description = models.TextField()

class Project(models.Model): 
    title       = models.CharField(max_length=45)
    description = models.TextField(blank=True)
    workers     = models.ForeignKey(Workers, on_delete=models.CASCADE)

class Assets(models.Model): 
    foto    = models.CharField(max_length=250)
    project = models.ForeignKey(Project, on_delete=models.CASCADE)