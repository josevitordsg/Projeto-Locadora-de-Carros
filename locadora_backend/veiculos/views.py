from contextvars import Token
from urllib import response
from django.shortcuts import render
from veiculos.models import Veiculo
from veiculos.serializers import VeiculoSerializer
from rest_framework import viewsets
from rest_framework import permissions
from rest_framework.authtoken.views import ObtainAuthToken

class VeiculoViewSet(viewsets.ModelViewSet):
    queryset = Veiculo.objects.all()
    serializer_class = VeiculoSerializer
    permission_classes = [permissions.IsAuthenticated]

class CustomAuthToken(ObtainAuthToken):
    def post(self, request, *args, **kwargs):
        serializer = self.serializer_class(data=request.data, context={'request': request})
        serializer.is_valid(raise_exception=True)
        user = serializer.validated_data['user']
        token, created = Token.objects.get_or_create(user=user)
        return response({'token': token.key, 'user_id': user.pk, 'email': user.email})
