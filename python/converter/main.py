import PySimpleGUI as sg
from PIL import Image
import glob

def convert(folder, file):
    path = glob.glob(str(folder)+'/*.png') #lokasi folder
    path.sort()
    imageList = list()

    image1 = Image.open(path[0])
    im1 = image1.convert('RGB')

    for i in range(1, len(path)):
        images = Image.open(path[i])
        ims = images.convert('RGB')
        imageList.append(ims)
    im1.save(file, save_all=True, append_image=imageList)

    layout = [
        [sg.Text('Sumber Gambar')],
        [sg.Input(key='sumber_folder'), sg.FolderBrowse('Cari Gambar')],
        [sg.Text('PDF image convert')],
        [sg.Input(key='target_file'), sg.FileSaveAs('Save', file_types=(('ALL Files', '*.pdf')))],
        [sg.OK('Convert PDF'), sg.Exit('Keluar')],
    ]

    window = sg.Window('Aplikasi Converter Image To PDF', layout)

    while True:
        event, values = window.read()
        try:
            if event in (None, 'Keluar'):
                break
            if event == 'Convert PDF':
                folder_input = values['sumber_folder']
                text_output = values['target_file']
                if folder_input!='' and text_output!='':
                    print(str(folder_input), str(text_output))
                    convert(folder_input, text_output)
                    sg.Popup('Info', 'Simpan Di : ' + text_output)
                else:
                    print('Batal')
        except ValueError:
            print(ValueError)
            print('terjadi Kesalahan')
            break
    window.close()