# modules/planck.py
def calcular_energia_planck(params):
    h = params['h']
    nu = params['nu']
    energia = h * nu
    return energia