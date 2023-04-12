import tkinter as tk
from tkinter import *
import mysql.connector
from tkinter import messagebox
import random
import string

con = mysql.connector.connect(host = "127.0.0.1",
                              user = "root",
                              password = "",
                              database = "bd")

def ve1 ():
    v.withdraw()
    v2 = tk.Toplevel()
    v2.title("Registro de alumno")
    v2.resizable(False, False)
    v2.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def vo():
        v.deiconify()
        v2.withdraw()
        
    def sd():
        ve2()
        v2.withdraw()
        
    def vr():
        if (r.get() == j):
            cur = con.cursor()
            sql = "INSERT IGNORE INTO niño (M, Nombre, Apellido, Grado, Grupo, Turno) VALUES ('{}', '{}', '{}', '{}', '{}', '{}')".format(m1.get(), m2.get(), m3.get(), m4.get(), m5.get(), m6.get())
            cur.execute(sql)
            con.commit()
            messagebox.showinfo(message="Bien hecho, te haz registrado", title= "Felicidades")
        else:
            messagebox.showerror(message="Incorrecto, ha escrito mal el captcha", title="Lastima, pero lo haz hecho mal")
    
    #t1 = tk.Text(v2, height = 10, width = 40)
    #t1.place(x=100, y=300)
    #texto = """Primer dialogo
    #del juego"""
    #t1.insert(tk.INSERT, texto)
    
    def ca():
        global j
        j = ''.join(random.choices(string.ascii_letters + string.digits, k=6))
        h = j
        t8.config(text = h)
    
    t2 = tk.Label(v2, text="Ingrese su matricula: ")
    t2.place(x=100, y=120)
    c1 = tk.Entry(v2, textvariable = m1)
    c1.place(x=230, y=120)
    
    t3 = tk.Label(v2, text="Ingrese su nombre: ")
    t3.place(x=100, y=150)
    c2 = tk.Entry(v2, textvariable = m2)
    c2.place(x=230, y=150)
    
    t4 = tk.Label(v2, text="Ingrese su apellido: ")
    t4.place(x=100, y=180)
    c3 = tk.Entry(v2, textvariable = m3)
    c3.place(x=230, y=180)
    
    t5 = tk.Label(v2, text="Ingrese su grado: ")
    t5.place(x=100, y=210)
    c3 = tk.Entry(v2, textvariable = m4)
    c3.place(x=230, y=210)
    
    t6 = tk.Label(v2, text="Ingrese su grupo: ")
    t6.place(x=100, y=240)
    c4 = tk.Entry(v2, textvariable = m5)
    c4.place(x=230, y=240)
    
    t7 = tk.Label(v2, text="Turno: ")
    t7.place(x=100, y=270)
    c5 = tk.Entry(v2, textvariable = m6)
    c5.place(x=230, y=270)
    
    t8 = tk.Label(v2, font=("Arial",24, "bold"))
    t8.place(x=100, y=370)
    c6 = tk.Entry(v2, textvariable = r)
    c6.place(x=100, y=430)
    
    b1 = tk.Button(v2, text="Regresar", command=vo)
    b1.place(x=230, y=600)
    
    b2 = tk.Button(v2, text="Salir", command=v2.quit)
    b2.place(x=130, y=600)
    
    b3 = tk.Button(v2, text="Siguiente", command=sd)
    b3.place(x=330, y=600)
    
    b4 = tk.Button(v2, text= "Registrar usuario", command=vr)
    b4.place(x=140, y=320)
    
    b5 = tk.Button(v2, text = "Generar Captcha", command = ca)
    b5.place(x=100,y=450)
    
def ve2():
    v3 = tk.Toplevel()
    v3.title("Preguntas")
    v3.resizable(False, False)
    v3.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def vo():
        ve1()
        v3.withdraw()
           
    #Hacer un save de las preguntas con la base de datos
    def pr():
        if opcion1.get() == 1:
            messagebox.showinfo("Ha contestado correctamente", "Felicidades ha contestado bien la pregunta 1")
            ve3()
            v3.withdraw()
            
        elif opcion1.get() == 2:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve3()
            v3.withdraw()
            
        elif opcion1.get() == 3:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve3()
            v3.withdraw()
        
    Op1 = tk.Radiobutton(v3, text='Respuesta 1', variable=opcion1, value=1)
    Op1.place(x=10,y=30)
    Op2 = tk.Radiobutton(v3, text='Respuesta 2', variable=opcion1, value=2)
    Op2.place(x=10,y=50)
    Op3 = tk.Radiobutton(v3, text='Pregunta 3', variable=opcion1, value=3)
    Op3.place(x=10,y=70)
    
    b1 = tk.Button(v3, text="Regresar", command=vo)
    b1.place(x=230, y=600)
    
    b2 = tk.Button(v3, text="Salir", command=v3.quit)
    b2.place(x=130, y=600)
    
    b3 = tk.Button(v3, text="Checar respuesta", command=pr)
    b3.place(x=330, y=600)
    
def ve3():
    v4 = tk.Toplevel()
    v4.title("Preguntas")
    v4.resizable(False, False)
    v4.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    
v = tk.Tk()
v.title("Ventana principal")
v.resizable(False, False)
v_height = 700
v_width = 500
screen_width = v.winfo_screenwidth()
screen_height = v.winfo_screenheight()
x_cordinate = int((screen_width/2) - (v_width/2))
y_cordinate = int((screen_height/2) - (v_height/2))
v.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))

opcion1 = IntVar()
m1 = IntVar()
m2 = StringVar()
m3 = StringVar()
m4 = IntVar()
m5 = StringVar()
m6 = StringVar()
r = StringVar()

t1 = tk.Label(v, text="Bienvenido al juego")
t1.place(x=190, y=100)

b1 = tk.Button(v, text="Empezar", command=ve1)
b1.place(x=330, y=600)

b2 = tk.Button(v, text="Salir", command=v.destroy)
b2.place(x=130, y=600)

v.mainloop()