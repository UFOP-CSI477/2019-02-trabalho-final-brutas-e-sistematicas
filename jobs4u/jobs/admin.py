from django.contrib import admin
from jobs import models

admin.site.register(models.Workers)
admin.site.register(models.Adress)
admin.site.register(models.Phone)
admin.site.register(models.Categories)
admin.site.register(models.Project)
admin.site.register(models.Assets)

# Register your models here.
