import tkinter as tk

def ve1 ():
    v.withdraw()
    v2 = tk.Toplevel()
    v2.geometry("300x200")
    v2.title("V1")
    v2.resizable(False, False)
    v2.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    def vo():
        v.deiconify()
        v2.withdraw()
        
    def sd():
        v3()
        v2.withdraw()
    
    t1 = tk.Text(v2, height = 10, width = 40)
    t1.place(x=100, y=300)
    texto = """Primer dialogo
    del juego"""
    t1.insert(tk.INSERT, texto)
    
    b1 = tk.Button(v2, text="Regresar", command=vo)
    b1.place(x=230, y=600)
    
    b2 = tk.Button(v2, text="Salir", command=v2.quit)
    b2.place(x=130, y=600)
    
    b3 = tk.Button(v2, text="Siguiente", command=sd)
    b3.place(x=330, y=600)
    
def v3():
    v3 = tk.Toplevel()
    v3.geometry("300x200")
    v3.title("Preguntas")
    v3.resizable(False, False)
    v3.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))
    
    
    
v = tk.Tk()
v.title("Ventana principal")
v.resizable(False, False)
v_height = 800
v_width = 500
screen_width = v.winfo_screenwidth()
screen_height = v.winfo_screenheight()
x_cordinate = int((screen_width/2) - (v_width/2))
y_cordinate = int((screen_height/2) - (v_height/2))
v.geometry("{}x{}+{}+{}".format(v_width, v_height, x_cordinate, y_cordinate))

t1 = tk.Label(v, text="Bienvenido al juego")
t1.place(x=190, y=100)



b1 = tk.Button(v, text="Empezar", command=ve1)
b1.place(x=330, y=600)

b2 = tk.Button(v, text="Salir", command=v.destroy)
b2.place(x=130, y=600)

v.mainloop()