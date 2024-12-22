package model;

import javax.persistence.*;

@Entity
@Table(name = "pedidos")
public class Pedidos {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)

    int idPedidos;
    int idFormasPagamentos, idUsuarios;
    String localizacao, dataPedido;

    public Pedidos() {
    }

    public Pedidos(int idFormasPagamentos, int idUsuarios, String localizacao, String dataPedido) {
        this.idFormasPagamentos = idFormasPagamentos;
        this.idUsuarios = idUsuarios;
        this.localizacao = localizacao;
        this.dataPedido = dataPedido;
    }

    public int getIdPedidos() {
        return idPedidos;
    }

    public void setIdPedidos(int idPedidos) {
        this.idPedidos = idPedidos;
    }

    public int getIdFormasPagamentos() {
        return idFormasPagamentos;
    }

    public void setIdFormasPagamentos(int idFormasPagamentos) {
        this.idFormasPagamentos = idFormasPagamentos;
    }

    public int getIdUsuarios() {
        return idUsuarios;
    }

    public void setIdUsuarios(int idUsuarios) {
        this.idUsuarios = idUsuarios;
    }

    public String getLocalizacao() {
        return localizacao;
    }

    public void setLocalizacao(String localizacao) {
        this.localizacao = localizacao;
    }

    public String getDataPedido() {
        return dataPedido;
    }

    public void setDataPedido(String dataPedido) {
        this.dataPedido = dataPedido;
    }
}
