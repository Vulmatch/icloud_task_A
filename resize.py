from PIL import Image

def resize():
 image = Image.open('D:\\xampp\\htdocs\\icloud_task_A\\logo\\raw1.png')
 new_image = image.resize((625, 103))
 new_image.save('D:\\xampp\\htdocs\\icloud_task_A\\logo\\logo1.png')
 
resize()