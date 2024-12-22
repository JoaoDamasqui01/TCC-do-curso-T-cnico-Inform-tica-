package model;

import javax.persistence.*;

@Entity
@Table(name = "tipositens")
public class TiposItens {
    @Id
    @GeneratedValue (strategy = GenerationType.IDENTITY)
    private int idTiposItens;
    private String descricao;

    public TiposItens() {
    }

    public TiposItens( String descricao) {
        this.descricao = descricao;
    }

    public int getIdTiposItens() {
        return idTiposItens;
    }

    public void setIdTiposItens(int idTiposItens) {
        this.idTiposItens = idTiposItens;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }


}
