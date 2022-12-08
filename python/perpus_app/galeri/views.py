from django.shortcuts import render

# Create your views here.

def slide(request):
    context = {
        'jdl' : 'Slide Show Image'
    }
    return render(request, 'admin/galeri/slide.html', context)