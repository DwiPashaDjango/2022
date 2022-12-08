
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