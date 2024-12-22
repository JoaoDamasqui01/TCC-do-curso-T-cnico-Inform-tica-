package model;

import javax.persistence.*;

@Entity
@Table(name = "formaspagamento")
public class FormasPagamentos {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int idFormasPagamentos;
    private String pagamentos;

    public FormasPagamentos() {
    }

    public int getIdFormasPagamentos() {
        return idFormasPagamentos;
    }

    public void setIdFormasPagamentos(int idFormasPagamentos) {
        this.idFormasPagamentos = idFormasPagamentos;
    }

    public String getPagamentos() {
        return pagamentos;
    }

    public void setPagamentos(String pagamentos) {
        this.pagamentos = pagamentos;
    }
}
