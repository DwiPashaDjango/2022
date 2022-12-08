from django.shortcuts import redirect, render

def ViewIndex(request):
    return render(request, 'index.html')