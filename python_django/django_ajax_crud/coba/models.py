from django.db import models
from django.contrib.auth.models import User
# Create your models here.
class Profile(models.Model):
    user_id = models.ForeignKey(User, on_delete=models.CASCADE, null=True, related_name='profile')
    avatar = models.ImageField(upload_to='profile_pics/')
    bio = models.CharField(max_length=1000, null=True)