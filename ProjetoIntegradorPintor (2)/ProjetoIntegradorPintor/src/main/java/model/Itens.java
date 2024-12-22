package model;

import javax.persistence.*;

@Entity
@Table(name = "itens")
public class Itens {

    @Id
    @GeneratedValue (strategy = GenerationType.IDENTITY)
    private int idItens;
    private int idMarcas, idTiposItens, idFornecedores, qtdeEstoque;
    private String nomeItem;
    private double precoUnitario;

    public Itens() {
    }

    public Itens(int idMarcas, int idTiposItens, int idFornecedores, int qtdeEstoque, String nomeItem, double precoUnitario) {
        this.idMarcas = idMarcas;
        this.idTiposItens = idTiposItens;
        this.idFornecedores = idFornecedores;
        this.qtdeEstoque = qtdeEstoque;
        this.nomeItem = nomeItem;
        this.precoUnitario = precoUnitario;

    }

    public int getIdItens() {
        return idItens;
    }

    public void setIdItens(int idItens) {
        this.idItens = idItens;
    }

    public int getIdMarcas() {
        return idMarcas;
    }

    public void setIdMarcas(int idMarcas) {
        this.idMarcas = idMarcas;
    }

    public int getIdTiposItens() {
        return idTiposItens;
    }

    public void setIdTiposItens(int idTiposItens) {
        this.idTiposItens = idTiposItens;
    }

    public int getIdFornecedores() {
        return idFornecedores;
    }

    public void setIdFornecedores(int idFornecedores) {
        this.idFornecedores = idFornecedores;
    }

    public int getQtdeEstoque() {
        return qtdeEstoque;
    }

    public void setQtdeEstoque(int qtdeEstoque) {
        this.qtdeEstoque = qtdeEstoque;
    }

    public String getNomeItem() {
        return nomeItem;
    }

    public void setNomeItem(String nomeItem) {
        this.nomeItem = nomeItem;
    }

    public double getPrecoUnitario() {
        return precoUnitario;
    }

    public void setPrecoUnitario(double precoUnitario) {
        this.precoUnitario = precoUnitario;
    }
}
