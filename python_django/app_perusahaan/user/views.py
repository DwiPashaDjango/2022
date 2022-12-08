from django.shortcuts import render

# Create your views here.
def v_hrd(request):
    return render(request, 'hrd/v_hrd.html')