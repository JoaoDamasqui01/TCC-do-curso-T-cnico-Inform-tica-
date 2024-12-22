package model;

import javax.persistence.*;

@Entity
@Table(name = "entregas")
public class Entregas {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int idEntregas;
    private String veiculo, placa, modelo;

    public Entregas() {
    }

    public Entregas(String veiculo, String placa, String modelo) {
        this.veiculo = veiculo;
        this.placa = placa;
        this.modelo = modelo;
    }

    public int getIdEntregas() {
        return idEntregas;
    }

    public void setIdEntregas(int idEntregas) {
        this.idEntregas = idEntregas;
    }

    public String getVeiculo() {
        return veiculo;
    }

    public void setVeiculo(String veiculo) {
        this.veiculo = veiculo;
    }

    public String getPlaca() {
        return placa;
    }

    public void setPlaca(String placa) {
        this.placa = placa;
    }

    public String getModelo() {
        return modelo;
    }

    public void setModelo(String modelo) {
        this.modelo = modelo;
    }
}
