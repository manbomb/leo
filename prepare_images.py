import os
import cv2

fotos = []
caminho = './images/'

for _, _, arquivo in os.walk(caminho):
	fotos = arquivo

print("\n")
print('Preparando '+str(len(fotos))+' fotos...')

for arq in fotos:
	img = cv2.imread(caminho+arq)

	''' # CROP IMAGE
	if img.shape[0] > img.shape[1]:
		inicio_x = 0
		fim_x = img.shape[1]
		inicio_y = int((img.shape[0]/2)-(img.shape[1]/2))
		fim_y = inicio_y+img.shape[1]
	else:
		inicio_y = 0
		fim_y = img.shape[0]
		inicio_x = int((img.shape[1]/2)-(img.shape[0]/2))
		fim_x = inicio_y+img.shape[0]

	img = img[inicio_y:fim_y,inicio_x:fim_x]
	'''
	img = cv2.resize(img,(500,500))
	cv2.imwrite(caminho+arq,img)
	#cv2.imshow(arq,img)

#cv2.waitKey(0)
#cv2.destroyAllWindows()
print("\nPronto...")

