package model;

import javax.persistence.*;

@Entity
@Table (name = "usuarios")
public class Usuarios {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)

    private int idUsuario;
    private String nomeCompleto;
    private long senha;
    private long cpf;

    public Usuarios() {
    }

    public Usuarios(String nomeCompleto, long senha, long cpf) {
        this.nomeCompleto = nomeCompleto;
        this.senha = senha;
        this.cpf = cpf;
    }

    public int getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(int idUsuario) {
        this.idUsuario = idUsuario;
    }

    public String getNomeCompleto() {
        return nomeCompleto;
    }

    public void setNomeCompleto(String nomeCompleto) {
        this.nomeCompleto = nomeCompleto;
    }

    public long getSenha() {
        return senha;
    }

    public void setSenha(long senha) {
        this.senha = senha;
    }

    public long getCpf() {
        return cpf;
    }

    public void setCpf(long cpf) {
        this.cpf = cpf;
    }
}
