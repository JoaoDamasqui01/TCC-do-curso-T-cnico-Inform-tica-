package model;

import javax.persistence.*;

@Entity
@Table (name = "marcas")
public class Marcas {
    @Id
    @GeneratedValue (strategy = GenerationType.IDENTITY)
    private int idMarcas;
    private String marcasProdutos;

    public Marcas() {
    }

    public Marcas(String marcasProdutos) {
        this.marcasProdutos = marcasProdutos;
    }

    public int getIdMarcas() {
        return idMarcas;
    }

    public void setIdMarcas(int idMarcas) {
        this.idMarcas = idMarcas;
    }

    public String getMarcasProdutos() {
        return marcasProdutos;
    }

    public void setMarcasProdutos(String marcasProdutos) {
        this.marcasProdutos = marcasProdutos;
    }

}
