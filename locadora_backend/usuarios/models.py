from django.contrib.auth.models import AbstractUser
from django.db import models

class Usuario(AbstractUser):
    cpf = models.CharField(max_length=14, unique=True)
    telefone = models.CharField(max_length=15)

    class Meta:
        verbose_name = "Usuário"
        verbose_name_plural = "Usuários"
