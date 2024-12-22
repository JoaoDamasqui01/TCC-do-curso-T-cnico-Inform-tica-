package model;

import javax.persistence.*;

@Entity
@Table(name = "pedidositens")
public class PedidosItens {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int idPedidosItens;
    private int idItens, idEntregas, idPedidos, qtde;
    private double precoUnitario, precoTotal;

    public PedidosItens() {
    }

    public PedidosItens(int idPedidos, int idItens, int idEntregas, int qtde, double precoUnitario, double precoTotal) {
        this.idItens = idItens;
        this.idEntregas = idEntregas;
        this.idPedidos = idPedidos;
        this.qtde = qtde;
        this.precoUnitario = precoUnitario;
        this.precoTotal = precoTotal;
    }

    public int getIdPedidosItens() {
        return idPedidosItens;
    }

    public void setIdPedidosItens(int idPedidosItens) {
        this.idPedidosItens = idPedidosItens;
    }

    public int getIdItens() {
        return idItens;
    }

    public void setIdItens(int idItens) {
        this.idItens = idItens;
    }

    public int getIdEntregas() {
        return idEntregas;
    }

    public void setIdEntregas(int idEntregas) {
        this.idEntregas = idEntregas;
    }

    public int getIdPedidos() {
        return idPedidos;
    }

    public void setIdPedidos(int idPedidos) {
        this.idPedidos = idPedidos;
    }

    public int getQtde() {
        return qtde;
    }

    public void setQtde(int qtde) {
        this.qtde = qtde;
    }

    public double getPrecoUnitario() {
        return precoUnitario;
    }

    public void setPrecoUnitario(double precoUnitario) {
        this.precoUnitario = precoUnitario;
    }

    public double getPrecoTotal() {
        return precoTotal;
    }

    public void setPrecoTotal(double precoTotal) {
        this.precoTotal = precoTotal;
    }
}
