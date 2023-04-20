import tkinter as tk
from tkinter import *
import mysql.connector
from tkinter import messagebox

con = mysql.connector.connect(host = "127.0.0.1",
                              user = "root",
                              password = "",
                              database = "bd")

def rm():
    v.withdraw()
    v1 = tk.Toplevel()
    v1.title("Registro de la meaestro/a")
    v1.resizable(False, False)
    v1.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def vo():
        v.deiconify()
        v1.withdraw()
        
    def sd():
        ve1()
        v1.withdraw()
        
    def vr():
            cur = con.cursor()
            sql = "INSERT IGNORE INTO profesor (ID, Nombre, Apellido, Turno, Grado, Grupo) VALUES ('{}', '{}', '{}', '{}', '{}', '{}')".format(m1.get(), m2.get(), m3.get(), m4.get(), m5.get(), m6.get())
            cur.execute(sql)
            con.commit()
            messagebox.showinfo("Te haz registrado")
            
    t2 = tk.Label(v1, text="Ingrese el nombre: ")
    t2.place(x=100, y=120)
    c1 = tk.Entry(v1, textvariable = m1)
    c1.place(x=230, y=120)
    
    t3 = tk.Label(v1, text="Ingrese apellido: ")
    t3.place(x=100, y=150)
    c2 = tk.Entry(v1, textvariable = m2)
    c2.place(x=230, y=150)
    
    t4 = tk.Label(v1, text="Ingrese el turno: ")
    t4.place(x=100, y=180)
    c3 = tk.Entry(v1, textvariable = m3)
    c3.place(x=230, y=180)
    
    t5 = tk.Label(v1, text="Ingrese su grado: ")
    t5.place(x=100, y=210)
    c3 = tk.Entry(v1, textvariable = m4)
    c3.place(x=230, y=210)
    
    t6 = tk.Label(v1, text="Ingrese su grupo: ")
    t6.place(x=100, y=240)
    c4 = tk.Entry(v1, textvariable = m5)
    c4.place(x=230, y=240)
    
    t7 = tk.Label(v1, text="Turno: ")
    t7.place(x=100, y=270)
    c5 = tk.Entry(v1, textvariable = m6)
    c5.place(x=230, y=270)
    
    t6 = tk.Label(v1, text="Ingrese una contraseña: ")
    t6.place(x=100, y=300)
    c4 = tk.Entry(v1, textvariable = m7)
    c4.place(x=230, y=300)
    
    b1 = tk.Button(v1, text="Regresar", command=vo)
    b1.place(x=230, y=600)
    
    b3 = tk.Button(v1, text="Siguiente", command=sd)
    b3.place(x=330, y=600)
    
    b4 = tk.Button(v1, text= "Registrar", command=vr)
    b4.place(x=170, y=420)
        
def lm():
    v.withdraw()
    v11 = tk.Toplevel()
    v11.title("Login de la meaestro/a")
    v11.resizable(False, False)
    v11.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def vo():
        v.deiconify()
        v11.withdraw()
        
    def sd():
        ve1()
        v11.withdraw()
    
    def vr():
            cur = con.cursor()
            sql = "SELECT * FROM profesor WHERE LOWER(REPLACE(Nombre, ' ', '')) OR ID = '{}' AND Contraseña = '{}'".format(m1.get(), m2.get())
            cur.execute(sql)
            con.commit()
            messagebox.showinfo("Iniciaste sesion")
            
    t2 = tk.Label(v11, text="Ingrese la ID o el nombre: ")
    t2.place(x=100, y=120)
    c1 = tk.Entry(v11, textvariable = m1)
    c1.place(x=230, y=120)
    
    t3 = tk.Label(v11, text="Ingrese la contraseña: ")
    t3.place(x=100, y=150)
    c2 = tk.Entry(v11, textvariable = m2)
    c2.place(x=230, y=150)
    
    b1 = tk.Button(v11, text="Regresar", command=vo)
    b1.place(x=230, y=600)
    
    b3 = tk.Button(v11, text="Siguiente", command=sd)
    b3.place(x=330, y=600)
    
    b4 = tk.Button(v11, text= "Iniciar sesion", command=vr)
    b4.place(x=140, y=320)
    
def ve1 ():
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
            cur = con.cursor()
            sql = "INSERT IGNORE INTO niño (M, Nombre, Apellido, Grado, Grupo, Turno, Contraseña) VALUES ('{}', '{}', '{}', '{}', '{}', '{}', '{}')".format(m1.get(), m2.get(), m3.get(), m4.get(), m5.get(), m6.get(), m7.get())
            cur.execute(sql)
            con.commit()
            messagebox.showinfo("Te haz registrado")
    
    #t1 = tk.Text(v2, height = 10, width = 40)
    #t1.place(x=100, y=300)
    #texto = """Primer dialogo
    #del juego"""
    #t1.insert(tk.INSERT, texto)
    
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
    
    t8 = tk.Label(v2, text="Contraseña: ")
    t8.place(x=100, y=300)
    c6 = tk.Entry(v2, textvariable = m7)
    c6.place(x=230, y=300)
    
    b1 = tk.Button(v2, text="Regresar", command=vo)
    b1.place(x=230, y=600)
    
    b3 = tk.Button(v2, text="Siguiente", command=sd)
    b3.place(x=330, y=600)
    
    b4 = tk.Button(v2, text= "Registrar estudiante", command=vr)
    b4.place(x=140, y=420)
    
def v2():
    v99 = tk.Toplevel()
    v99.title("Inicio de sesion del alumno")
    v99.resizable(False, False)
    v99.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    
    
def v1():
    v9 = tk.Toplevel()
    v9.title("Ronda 1 de preguntas")
    v9.resizable(False, False)
    v9.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def ne():
        ve2()
        v9.withdraw()
    
    t1 = tk.Label(v9, text="Comezaremos con la primera ronda")
    t1.place(x=10,y=30)

    t2= tk.Label(v9, text='Presiona listo')
    t2.place(x=80,y=70)

    btn1 = tk.Button(v9, text = "¡Listo!", command = ne)
    btn1.place(x=170,y=140)
    
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
        
    Op1 = tk.Radiobutton(v3, text='a) Gripe', variable=opcion1, value=1)
    Op1.place(x=10,y=30)
    Op2 = tk.Radiobutton(v3, text='b) SIDA', variable=opcion1, value=2)
    Op2.place(x=10,y=50)
    Op3 = tk.Radiobutton(v3, text='c) Inflamación de garganta', variable=opcion1, value=3)
    Op3.place(x=10,y=70)
    Op4 = tk.Radiobutton(v3, text='c) Inflamación de garganta', variable=opcion1, value=3)
    Op4.place(x=10,y=70)
    
    texto1 = tk.Label(v3, text="1.¿Cuál de las siguientes es una enfermedad de transmisión sexual?")
    texto1.place(x=10,y=10)

    
    b3 = tk.Button(v3, text="Checar respuesta", command=pr)
    b3.place(x=330, y=600)
    
def ve3():
    v4 = tk.Toplevel()
    v4.title("Preguntas")
    v4.resizable(False, False)
    v4.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def vo():
        ve1()
        v4.withdraw()
           
    #Hacer un save de las preguntas con la base de datos
    def pr():
        if opcion1.get() == 1:
            messagebox.showinfo("Ha contestado correctamente", "Felicidades ha contestado bien la pregunta 1")
            ve4()
            v4.withdraw()
            
        elif opcion1.get() == 2:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve4()
            v4.withdraw()
            
        elif opcion1.get() == 3:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve4()
            v4.withdraw()
        
    Op1 = tk.Radiobutton(v4, text='a) Virus Papiloma Humano', variable=opcion1, value=1)
    Op1.place(x=10,y=30)
    Op2 = tk.Radiobutton(v4, text='b) Virus Pulmonar Hiperactivo', variable=opcion1, value=2)
    Op2.place(x=10,y=50)
    Op3 = tk.Radiobutton(v4, text='c) Vaginitis Pseudomembranosa', variable=opcion1, value=3)
    Op3.place(x=10,y=70)
    Op4 = tk.Radiobutton(v4, text='c) Virus Prostático Hipertrófico', variable=opcion1, value=3)
    Op4.place(x=10,y=70)
    
    texto1 = tk.Label(v4, text="2.	¿Qué significa la sigla VPH?")
    texto1.place(x=10,y=10)

    
    b3 = tk.Button(v4, text="Checar respuesta", command=pr)
    b3.place(x=330, y=600)
    
def ve4():
    v5 = tk.Toplevel()
    v5.title("Preguntas")
    v5.resizable(False, False)
    v5.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def vo():
        ve1()
        v5.withdraw()
           
    #Hacer un save de las preguntas con la base de datos
    def pr():
        if opcion1.get() == 1:
            messagebox.showinfo("Ha contestado correctamente", "Felicidades ha contestado bien la pregunta 1")
            ve4()
            v5.withdraw()
            
        elif opcion1.get() == 2:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve4()
            v5.withdraw()
            
        elif opcion1.get() == 3:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve4()
            v5.withdraw()
        
    Op1 = tk.Radiobutton(v5, text='a) Condón', variable=opcion1, value=1)
    Op1.place(x=10,y=30)
    Op2 = tk.Radiobutton(v5, text='b) Píldora anticonceptiva', variable=opcion1, value=2)
    Op2.place(x=10,y=50)
    Op3 = tk.Radiobutton(v5, text='c) Implante subdérmico', variable=opcion1, value=3)
    Op3.place(x=10,y=70)
    Op4 = tk.Radiobutton(v5, text='c) Ninguno es 100 efectivo', variable=opcion1, value=3)
    Op4.place(x=10,y=70)
    
    texto1 = tk.Label(v5, text="3.	¿Qué método anticonceptivo es más efectivo?")
    texto1.place(x=10,y=10)

    
    b3 = tk.Button(v5, text="Checar respuesta", command=pr)
    b3.place(x=330, y=600)
    
def ve5():
    v6 = tk.Toplevel()
    v6.title("Preguntas")
    v6.resizable(False, False)
    v6.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def vo():
        ve1()
        v6.withdraw()
           
    #Hacer un save de las preguntas con la base de datos
    def pr():
        if opcion1.get() == 1:
            messagebox.showinfo("Ha contestado correctamente", "Felicidades ha contestado bien la pregunta 1")
            ve5()
            v6.withdraw()
            
        elif opcion1.get() == 2:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve5()
            v6.withdraw()
            
        elif opcion1.get() == 3:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve5()
            v6.withdraw()
        
    Op1 = tk.Radiobutton(v6, text='a) A los 15 años', variable=opcion1, value=1)
    Op1.place(x=10,y=30)
    Op2 = tk.Radiobutton(v6, text='b) A los 20 años', variable=opcion1, value=2)
    Op2.place(x=10,y=50)
    Op3 = tk.Radiobutton(v6, text='c) A los 25 años', variable=opcion1, value=3)
    Op3.place(x=10,y=70)
    Op4 = tk.Radiobutton(v6, text='c) A los 30 años', variable=opcion1, value=3)
    Op4.place(x=10,y=70)
    
    texto1 = tk.Label(v6, text="4.	¿A qué edad una mujer alcanza su fertilidad máxima?")
    texto1.place(x=10,y=10)

    
    b3 = tk.Button(v6, text="Checar respuesta", command=pr)
    b3.place(x=330, y=600)
    
def ve6():
    v7 = tk.Toplevel()
    v7.title("Preguntas")
    v7.resizable(False, False)
    v7.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def vo():
        ve1()
        v7.withdraw()
           
    #Hacer un save de las preguntas con la base de datos
    def pr():
        if opcion1.get() == 1:
            messagebox.showinfo("Felicidades ha contestado bien la pregunta 1")
            ve6()
            v7.withdraw()
            
        elif opcion1.get() == 2:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve6()
            v7.withdraw()
            
        elif opcion1.get() == 3:
            messagebox.showinfo("Ha contestado erronamente", "Lo siento, ha contestado mal la pregunta 1")
            ve6()
            v7.withdraw()
        
    Op1 = tk.Radiobutton(v7, text='a) Condón', variable=opcion1, value=1)
    Op1.place(x=10,y=30)
    Op2 = tk.Radiobutton(v7, text='b) Píldora anticonceptiva', variable=opcion1, value=2)
    Op2.place(x=10,y=50)
    Op3 = tk.Radiobutton(v7, text='c) Dispositivo intrauterino (DIU)', variable=opcion1, value=3)
    Op3.place(x=10,y=70)
    Op4 = tk.Radiobutton(v7, text='c) Coito interrumpido', variable=opcion1, value=3)
    Op4.place(x=10,y=70)
    
    texto1 = tk.Label(v7, text="5.	¿Cuál es el método anticonceptivo más usado en el mundo?")
    texto1.place(x=10,y=10)

    
    b3 = tk.Button(v3, text="Checar respuesta", command=pr)
    b3.place(x=330, y=600)

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
m7 = StringVar()
r = StringVar()

t1 = tk.Label(v, text="Bienvenido al juego")
t1.place(x=190, y=100)

b1 = tk.Button(v, text="Registrar \n profesor", command=rm)
b1.place(x=230, y=590)

b3 = tk.Button(v, text="Inicio de sesion \n de profesor", command=lm)
b3.place(x=360, y=590)

b2 = tk.Button(v, text="Salir", command=v.destroy)
b2.place(x=130, y=600)

v.mainloop()